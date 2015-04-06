<!--  Nav adds the navigation for easy transitions to all pages-->
<!-- ###################### Main Navigation ########################## -->
<nav>
     <ol>
         <?php
         /* This sets the current page to not be a link. Repeat this if block for
           * each menu item */
         
         
         if ($path_parts['filename'] == "index") {
             print '<li class="activePage">Home</li>';
            
        } else {
             print '<li><a href="index.php">Home</a></li>';
            
        }
        
         /* example of repeating */
         if ($path_parts['filename'] == "form") {
             print '<li class="activePage">Sign up</li>';
            
        } else {
             print '<li><a href="form.php">Sign up</a></li>';
            
        }
        
        ?>
         </ol>
    </nav>
