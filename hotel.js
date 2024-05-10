// for loading screen// > 
const loader = document.querySelector(".box");
window.addEventListener('load', () =>{
    loader.style.opacity = '0';

    setTimeout(()=>{
        loader.style.display = 'none';
    },1000);
});
// ---infinity corosoul

const scrollers = document.querySelectorAll('.scroller');

function addAnimation() {
    scrollers.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);

        const scrollerInner = scroller.querySelector('.scroller_inner');
        const scrollerInnerContent = Array.from(scrollerInner.children);

        scrollerInnerContent.forEach(item => {
            const duplicatedItem = item.cloneNode(true); // Fix typo: 'clloneNode' to 'cloneNode'

            duplicatedItem.setAttribute('aria-hidden', true);

            scrollerInner.appendChild(duplicatedItem);
        });
    });
}
// ----------------this code impact on infinity corosoul 
addAnimation();
// for navbar--------
window.onscroll = function() {
    var navbar = document.querySelector(".navbar");h
    var navbarLinks = document.querySelectorAll(".navbar .nav-link");
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      navbar.classList.remove("bg-transparent");
      navbarLinks.forEach(function(link) {
      div.style.color = "black";
      });
    } else {
      navbar.classList.add("bg-transparent");
      navbarLinks.forEach(function(link) {
        div.style.color = "black";
      });
    }
  };

  window.addEventListener('scroll', () =>{
    const navbar = document.querySelector('navbar');
    if (window.scrollY > 0) {
      navbar.classList.add('navbar-scrolled');
    } 
    else {
      navbar.classList.remove('navbar-scrolled');
    }
  });
  

        $(document).ready(function () {
            $.validator.addMethod("fnregex", function (value, element) {
                var regex = /^[a-zA-Z ]+$/;
                return regex.test(value);
            }, "Please enter a valid full name with only letters");

            $.validator.addMethod("emailregex", function (value, element) {
                // Basic email validation regex
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(value);
            }, "Please enter a valid email address");

            $.validator.addMethod("passwordregex", function (value, element) {
                // Basic password validation regex (at least 8 characters including at least one uppercase, one lowercase, one number, and one special character)
                var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                return regex.test(value);
            }, "Password must be at least 8 characters and include at least one uppercase letter, one lowercase letter, one number, and one special character");

            $("#signupForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        maxlength: 50,
                        fnregex: true
                    },
                    email: {
                        required: true,
                        email: true,
                        emailregex: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        passwordregex: true
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Full name must be at least 2 characters",
                        maxlength: "Full name cannot exceed 50 characters",
                        fnregex: "Please enter a valid full name with only letters"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                        emailregex: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters",
                        passwordregex: "Password must include at least one uppercase letter, one lowercase letter, one number, and one special character"
                    },
                    confirm_password: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    }
                },
                errorPlacement: function (error, element) {
                    var name = element.attr('name');
                    if (name === "name" || name === "email" || name === "password" || name === "confirm_password") {
                        $('#' + name + '_err').html(error);
                    }
                },
            });
        });
    