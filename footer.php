
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body{
    line-height: 1.5;
    font-family: 'Poppins', sans-serif;
}
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}
.container{
    max-width: 1170px;
    margin:auto;
}
.row{
    display: flex;
    flex-wrap: wrap;
}
ul{
    list-style: none;
}
.footer{
    background-color: #24262b;
    padding: 30px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
    font-size: 18px;
    color: #ffffff;
    text-transform: capitalize;
    margin-bottom: 35px;
    font-weight: 500;
    position: relative;
}
.footer-col h4::before{
    content: '';
    position: absolute;
    left:0;
    bottom: -10px;
    background-color: #e91e63;
    height: 2px;
    box-sizing: border-box;
    width: 50px;
}
.footer-col ul li:not(:last-child){
    margin-bottom: 10px;
}
.footer-col ul li a{
    font-size: 16px;
    text-transform: capitalize;
    color: #ffffff;
    text-decoration: none;
    font-weight: 300;
    color: #bbbbbb;
    display: block;
    transition: all 0.3s ease;
}
.footer-col ul li a:hover{
    color: #ffffff;
    padding-left: 8px;
}
.footer-col .social-links a{
    display: inline-block;
    height: 40px;
    width: 40px;
    background-color: rgba(255,255,255,0.2);
    margin:0 10px 10px 0;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    color: #ffffff;
    transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
    color: #24262b;
    background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}
.copyright-area{
  background: #202020;
  padding: 15px 0;
}
.copyright-text p {
  margin: 0;
  font-size: 14px;
  color: #878787;
}
.copyright-text p a{
  color: #ff5e14;
}



</style>

<footer class="footer mt-5">
     <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="aboutus.php">about us</a></li>
                    <li><a href="#">our services</a></li>
                    <li><a href="#">privacy policy</a></li>
                    <li><a href="#">affiliate program</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="all_courses.php">Course</a></li>
                    <li><a href="all_teacher.php">Our Teachers</a></li>
                    <li><a href="all_blog.php">Blogs</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Short Links</h4>
                <ul>
                    <li><a href="#">News & Events</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">Reflection</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a href="https://pk.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
     </div>

  </footer>
       <div class="copyright-area">
            <div class="container">
                <div class="row">
        <div class="col-xl-9 col-lg-9 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2024, All Right Reserved <a href="#">Progressive Website for a Training Company</a></p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>