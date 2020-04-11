export default {
        template: `<div> 
        <header id="mainHeader">


        <!--Beginning of Logo-->
       <div id="logo">
           <a href="index.html"><img src="" alt="logo"></a>
         </div>

         <nav id="mainNav"><!--beginning of mainNav-->
          <button id="button"></button>

           <h2 class="hidden">header nav</h2>

           <!-- this is my dropdown nav element -->
           <nav id="burgerCon">
               <h1 class="close">X</h1>

             <ul id="burgerMenu">
             <router-link to="/p1" class="login">page test</router-link>
                   <li><a href="contact.html">CONTACT US</a></li>
             <router-link to="/login" class="login">Login</router-link>

             </ul>

             <button id="nav-btn">HIRE US</button>

             <div class="iconNav">
               <a href="twitter.com"><img src="images/twitter-icon_orange.svg" alt="twitter icon"></a>
               <a href="facebook.com"><img src="images/facebook-icon_orange.svg" alt="facebook icon"></a>
               <a href="instagram.com"><img src="images/instagram-icon_orange.svg" alt="instagram icon"></a>
            </div>


           </nav>
           <!-- end dropdown nav -->
         </nav>


     </header>
        </div>
        `,
}

