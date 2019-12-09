'use strict';

function getImage(a) {
  let item_list = document.getElementsByClassName('image_list');
  let cc = item_list[a].getElementsByClassName("item_image");
  let mainImage = document.getElementById("mainImage");
  mainImage.src = cc[0].src;
}
