
const navMenu = document.getElementById('nav-menu'),
  navToggle = document.getElementById('nav-toggle'),
  navClose = document.getElementById('nav-close')

if (navToggle) {
  navToggle.addEventListener('click', () => {
    navMenu.classList.add('show-menu');
  });
}

if (navClose) {
  navClose.addEventListener('click', () => {
    navMenu.classList.remove('show-menu');
  });
}

function imgGallery(){
  const mainImg = document.querySelector('.details_img'),
   smallImg = document.querySelectorAll('.details_small-img');
   smallImg.forEach((img) => {
    img.addEventListener('click',function() {
      mainImg.src = this.src;
    });
   });
}
imgGallery();

var swipercategories = new Swiper(".categories_container", {
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      350: {
        slidesPerView: 2,
        spaceBetween: 24,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 20,
       },
      1200: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
      1400: {
        slidesPerView: 6,
        spaceBetween: 24,
      },
    },
  });

var swiperproducts = new Swiper('.new_container', {
    spaceBetween: 24,
    loop: true,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 24,
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 24,
        },
        1400: {
          slidesPerView: 4,
          spaceBetween: 24,
        },
      },
  });

const tabs = document.querySelectorAll( '[data-target]'),
    tabContent = document.querySelectorAll('[content]');
tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.target);
        console.log(target);
        tabContent.forEach((tabContent) => {
            tabContent.classList.remove('active-tab');
        });
        target.classList.add('active-tab');
       tabs.forEach((tab) => {
        tab.classList.remove('active-tab');
       });
       tab.classList.add('active-tab');
    });
});

function addToCart(productId, productName, productPrice, productImage) {
  const cartItems = document.getElementById('cart-items');
  let quantity = 1; 


  const row = cartItems.insertRow();
  row.setAttribute('data-id', productId);
  row.innerHTML = `
      <td><img src="${productImage}" style="width:50px; height:auto;"></td>
      <td>${productName}</td>
      <td>${productPrice}</td>
      <td><input type="number" value="${quantity}" min="1" onchange="updateQuantity(this, ${productPrice})"></td>
      <td>${productPrice}</td>
      <td><button onclick="removeFromCart(this)">إزالة</button></td>
  `;

  updateTotalPrice();
}

function removeFromCart(button) {
  const row = button.parentElement.parentElement;
  row.parentElement.removeChild(row);
  updateTotalPrice();
}

function updateQuantity(input, price) {
  const row = input.parentElement.parentElement;
  const totalCell = row.cells[4];
  totalCell.textContent = (input.value * price).toFixed(2);
  updateTotalPrice();
}

function updateTotalPrice() {
  const totalCell = document.getElementById('total-price');
  let total = 0;
  document.querySelectorAll('#cart-items tr').forEach(row => {
      const quantity = row.cells[3].querySelector('input').value;
      const price = row.cells[2].textContent;
      total += quantity * price;
  });
  totalCell.textContent = total.toFixed(2);
}