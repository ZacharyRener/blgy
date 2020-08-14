# Front-end Developer Toolkit
## Features:
React, DOM routing based on body class, SASS, Webpack, TypeScript, Babel
## Description:
Boilerplate for a SASS & React based workflow
## Usage
**1. Install the tool kit**

    git clone https://github.com/ZacharyRener/Front-End-Toolkit/
    cd Front-End-Toolkit
    npm install
     
**2. Compile**

    ./node_modules/.bin/webpack --watch

**3. Add it to your website**

    <script src="./Front-End-Toolkit/build/main.min.js"></script>
    
## Troubleshooting
**Make sure you have updated versions of Node and NPM**
    
    npm cache clean -f
    npm install -g n
    n latest
    
    npm install -g npm@latest


## For MIFW
    
    <!-- ============================================================== -->
    <!-- MIFW Theme Files -->
    <!-- ============================================================== -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/Front-End-Toolkit/build/main.min.js" ></script> 
    <!-- ============================================================== -->
    
