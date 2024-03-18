/*=============== SHOW MENU ===============*/

// Get the search input field and search button
/*var searchInput = document.getElementById("search-input").value.toUpperCase();
var searchButton = document.getElementById("search-button");

// Add event listener to the search button
searchButton.addEventListener("click", function(event) {
  // Prevent form submission
  event.preventDefault();

  // Validate search input
  var searchTerm = searchInput.value.trim(); // Trim any leading/trailing whitespaces
  if (searchTerm === "") {
    alert("Please enter a search term.");
    return;
  }

  // Perform search or any other action
  performSearch(searchTerm);
});

// Function to perform search
function performSearch(searchTerm) {
  // Your logic for performing the search
  const storeitems = document.getElementById('product-list');
  const product = document.querySelectorAll('.product__item');
  const pname = document.getElementsByTagName('h3');

  for(var i =0; i<pname.length; i++){
    let match = product[i].getElementsByTagName('h3')[0];

    if(match){
     let textvalue= match.textContent|| match.innerHTML;

     if(textvalue.toUpperCase().indexOf(searchInput)>-1){
      product[i].Style.display = "";
     }
     else{
      product[i].Style.display="none";
     }
    }
  }
}
performSearch(searchTerm);
*/
document.querySelector('#search-input').addEventListener('input', filterList)

function filterList() {
  const searchInput = document.querySelector('#search-input');
  const filter = searchInput.value.toLowerCase();
  const listItems = document.querySelectorAll('.product__item ');

  listItems.forEach((items)=>{
    let text = items.textContent

    if(text.toLowerCase().includes(filter.toLowerCase())){
      items.style.display = '';
    }

    else{
      items.style.display = 'none';
    }
  });
  
}
filterList();

/*===== Menu Show =====*/
const navMenu = document.getElementById('nav-menu'),
  navToggle = document.getElementById('nav-toggle'),
  navClose = document.getElementById('nav-close');
/* Validate if constant exists */
if(navToggle){
  navToggle.addEventListener('click', ()=>{
    navMenu.classList.add('show-menu');
  });
}
/*===== Hide Show =====*/
/* Validate if constant exists */
if(navClose){
  navClose.addEventListener('click', ()=>{
    navMenu.classList.remove('show-menu');
  });
}

/*=============== SWIPER CATEGORIES ===============*/

var swiperCategories = new Swiper(".categories__container", {
    spaceBetween: 24,
    loop:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        768: {
          slidesPerView: 4,
          spaceBetween: 24,
        },
        992: {
          slidesPerView: 5,
          spaceBetween: 24,
        },
        1400: {
          slidesPerView: 6,
          spaceBetween: 24,
        },
      },

  });

/*=============== SWIPER PRODUCTS ===============*/
var swiperProducts = new Swiper(".new__container", {
  spaceBetween: 24,
  loop:true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      1400: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
    },

});

/*=============== PRODUCTS TABS ===============*/
