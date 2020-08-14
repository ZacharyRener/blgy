import React, { Component } from 'react'

interface AppProps {}
interface AppState {
    posts: Array<any>,
    categories: Array<any>,
    selectedCat: string,
    buttonText: string,
    postOffset: number,
    postsPerPage: number,
    categoryUrl: string,
    selectedClass: string,
}

export default class Blog extends Component<AppProps, AppState>  {

    constructor(props: any) {

        super(props)
        this.state = {
            posts: [],
            categories: [],
            selectedCat: '',
            buttonText: 'Content is loading...',
            postOffset: 0,
            postsPerPage: 9,
            categoryUrl: '',
            selectedClass: 'hide',
        }

        this.loadBlogPosts = this.loadBlogPosts.bind(this)
        this.loadCategories = this.loadCategories.bind(this)
        this.handleButtonClick = this.handleButtonClick.bind(this)
        this.handleCategoryClick = this.handleCategoryClick.bind(this)
        this.handleCategoryRemoval = this.handleCategoryRemoval.bind(this)
        this.loadBlogPosts()
        this.loadCategories()

    }

    loadBlogPosts() {

        const fetchUrl = `/wp-json/wp/v2/posts?per_page=${this.state.postsPerPage}&offset=${this.state.postOffset}&_embed${this.state.categoryUrl}`
        console.log(fetchUrl)

        fetch(fetchUrl)
            .then(response => response.json() )
            .then(data => {
                this.setState({ posts: this.state.posts.concat(data) })
                this.setState({ buttonText: 'View More' })
            })

    }

    loadCategories() {

        fetch('/wp-json/wp/v2/categories')
            .then(response => response.json()) 
            .then(data => {
                this.setState({ categories: this.state.categories.concat(data) })
            })

    }

    handleButtonClick(event: any) {

        event.preventDefault()
        this.setState({ buttonText: 'Content is loading...' })
        this.setState({ postOffset: this.state.postOffset + this.state.postsPerPage }, () => {
            this.loadBlogPosts()
        })

    }

    handleCategoryClick(categoryId: number, categoryName: string) {

        this.setState({ buttonText: 'Content is loading...' })
        this.setState({ selectedCat: categoryName })
        this.setState({ selectedClass: 'show' })

        this.setState({ posts: [] }, () => {
            this.setState({ postOffset: 0 }, () => {
                this.setState({ categoryUrl: `&categories=${categoryId}` }, () => {
                    this.loadBlogPosts()
                })
            })
        })

    }

    handleCategoryRemoval() {

        this.setState({ buttonText: 'Content is loading...' })
        this.setState({ selectedClass: 'hide' })

        this.setState({ selectedCat: '' }, () => {
            this.setState({ categoryUrl: '' }, () => {
                this.setState({ postOffset: 0 }, () => {
                    this.setState( {posts: []}, () => {
                        this.loadBlogPosts()
                    } )
                })
            })
        })

    }

    render() {

        return (

            <section id="blogPage">

                <div className='sidebar col-md-3'>

                    <h2>Categories</h2>
                    <ul className="sidebar-links">
                    {this.state.categories.map( (category, id) => {

                        return (
                            <li className="cat-item" key={id} >
                                <a onClick={ ()=> this.handleCategoryClick(category.id, category.name) } 
                                    dangerouslySetInnerHTML={{__html: category.name}} />
                            </li>
                        )

                    })}
                    </ul>

                </div>
                

                <div className="blogs col-md-9">
                    
                    <section id="selectedCats" className={this.state.selectedClass}>
                        <span onClick={this.handleCategoryRemoval}>{this.state.selectedCat}</span>
                    </section>

                    {this.state.posts.map( (post, id) => {
                        
                        const image = () => { 
                            const hasMedia: boolean = post._embedded.hasOwnProperty("wp:featuredmedia")
                            const hasImage: boolean = hasMedia 
                                ? post._embedded["wp:featuredmedia"][0].hasOwnProperty("source_url")
                                : false;
                            return hasMedia && hasImage
                                ? ( <img src={post._embedded["wp:featuredmedia"][0].source_url }></img> )
                                : ( <div className="imageSpacer" /> );
                        }

                        const date = new Date(post.date).toISOString().slice(0,10);

                        return (
                            <div className="col-md-4 post" key={id}>
                                {image()}
                                <a href={post.link}>{post.title.rendered}</a>
                                <div className="date">{date}</div>
                                <div className="excerpt" 
                                    dangerouslySetInnerHTML={{__html: post.title.rendered}}  />
                            </div>
                        )
                    })}

                    <div className='btnWrapper'>
                        <a onClick={this.handleButtonClick} className="btn btn-default btn-orange">{this.state.buttonText}</a>
                    </div>

                </div>
      
            </section>

        );
    }
}