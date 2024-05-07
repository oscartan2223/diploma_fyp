var form_1 = document.querySelector(".form_1");
var form_2 = document.querySelector(".form_2");

var form_2_card = document.querySelector(".card");
var form_2_online = document.querySelector(".online");
var form_2_ewallet = document.querySelector(".ewallet");

var card_pay = document.querySelector(".card_payment");
var online_pay = document.querySelector(".online_banking");
var e_pay = document.querySelector(".e-wallet");

var form_2_btns = document.querySelector(".form_2_btns");
var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");

var form_2_progressbar = document.querySelector(".form_2_progressbar");

var btn_done = document.querySelector(".btn_done");
var modal_wrapper = document.querySelector(".modal_wrapper");
var shadow = document.querySelector(".shadow");

card_pay.addEventListener("click",function(){
  form_1.style.display = "none";
  form_2.style.display = "block";
  form_2_card.style.display = "block";

  form_2_btns.style.display = "flex";
  form_2_progressbar.classList.add("active");
});

online_pay.addEventListener("click",function(){
  form_1.style.display = "none";
  form_2.style.display = "block";
  form_2_online.style.display = "block";

  form_2_btns.style.display = "flex";
  form_2_progressbar.classList.add("active");
});

e_pay.addEventListener("click",function(){
  form_1.style.display = "none";
  form_2.style.display = "block";
  form_2_ewallet.style.display = "block";

  form_2_btns.style.display = "flex";
  form_2_progressbar.classList.add("active");
});

form_2_back_btn.addEventListener("click",function(){
    form_1.style.display = "block";
    form_2.style.display = "none";

    form_2_card.style.display = "none";
    form_2_online.style.display = "none";
    form_2_ewallet.style.display = "none";

    form_2_btns.style.display = "none"; 

    form_2_progressbar.classList.remove("active");
});

btn_done.addEventListener("click",function(){
    modal_wrapper.classList.add("active");
})

shadow.addEventListener("click",function(){
    modal_wrapper.classList.remove("active");
})