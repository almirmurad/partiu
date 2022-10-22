
let totalCtaItems = document.querySelectorAll('.internal-categorie-item').length;
let currentCtaSlide = 0;
document.querySelector('.internal-categories-area').style.width = `calc( 240px * ${totalInternalCategoriesItem})`;

//slide categorias

function goPrevCat(){
    currentCategorieSlide--;
    console.log(currentCategorieSlide);
    if(currentCategorieSlide < 0){
        currentCategorieSlide = totalInternalCategoriesItem - 1;
    }
    updateMarginCat();
}

function goNextCat(){
    currentCategorieSlide ++;
    if(currentCategorieSlide > (totalInternalCategoriesItem - 1)){
        currentCategorieSlide = 0;
    }
    updateMarginCat();
}

function updateMarginCat(){
    let sliderCatItemWidth = document.querySelector('.internal-categorie-item').clientWidth;
    let newMarginCat = (currentCategorieSlide * sliderCatItemWidth);
    document.querySelector('.internal-categories-area').style.marginLeft = `-${newMarginCat}px`;

}


