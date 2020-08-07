// what did you forget here?
// there is no instructions for hacking roblox
// there is JS only

console.log("%c ОСТАНОВИТЕСЬ!!!",'color: #b83434;font-size: 50px')
console.log("%c ЕСЛИ ВАС ПОПРОСИЛИ ЧТО-ЛИБО ВСТАВИТЬ СЮДА , ТО В 11 СЛУЧАЯХ ИЗ 10 ВАС ПЫТАЮТСЯ ОБМАНУТЬ!",'color: #b83434;font-size: 25px')
console.log("%c Даже не смейте сюда что-либо вставлять!",'color: #b83434;font-size: 25px')

let robuxPrice = 0.5;
let main_slider;

let lastPosY = window.pageYOffset;
const payout_Method = "QIWI"; // TODO: do different pay method

window.addEventListener("DOMContentLoaded",()=>{

    let wrapper = document.getElementById("pay_method_wrapper");
    if(wrapper){
        wrapper.onclick = function (e) {
            let childrens = wrapper.children;

            if(childrens.length === 1) return;

            for(let i =0;i < childrens.length;i++){
                let child = childrens[i];

                child.classList.toggle("active");
            }
        }
    }

    let header = document.getElementsByTagName("header")[0];
    if(header){
        window.onscroll = function () {
            if(window.pageYOffset > lastPosY){
                header.classList.add("hidden")
            }else{
                header.classList.remove("hidden")
            }

            lastPosY = window.pageYOffset;
        }
    }
    if(document.getElementById("form_name"))
    {
        document.getElementById("form_name").oninput = document.getElementById("form_count").oninput = function () {
            checkForm();
        }
    }
})

function form_order() {
    //window.location.href = `https://qiwi.com/payment/form/99?currency=RUB&amount=${count.value*robuxPrice}&extra%5B%27account%27%5D=79913035754&extra%5B%27comment%27%5D=${name.value}`;
}

function checkForm() {
    let name = document.getElementById("form_name");
    let count = document.getElementById("form_count");
    let pay_btn = document.getElementById("pay_button");

    if(name.value === "") return pay_btn.innerText = "Заполните поля выше";
    if(!+count.value || +count.value < 1) return pay_btn.innerText = "Заполните поля выше";

    pay_btn.innerText = "Вперед";
    pay_btn.removeAttribute("disabled");
    pay_btn.onclick = function () {
        form_order(name.value,count.value,"QIWI");

        pay_btn.innerText = "...";
        pay_btn.onclick   = null;

        //window.location.href = `https://qiwi.com/payment/form/99?currency=RUB&amount=${count.value*robuxPrice}&extra%5B%27account%27%5D=79913035754&extra%5B%27comment%27%5D=${name.value}`;
    }
}

function postAsyncQuery(array) {
    return new Promise(((resolve, reject) => {
        array = prepareData(array);

        let xhr = new XMLHttpRequest();
        xhr.open("POST",  "/php/async", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
        xhr.send(createQueryString(array));
        xhr.onload = function(res){
            resolve(res.target.response);
        };
    }))
}

function prepareData(array) {
    Object.keys(array).forEach(pair=>{
        array[pair] = array[pair].replace(/[&]/gm,`\\$&`);
    })
    return array;
}

function createQueryString(array) {
    let pairs = [];
    for(let pair in array){
        pairs.push(pair+'='+array[pair]);
    }

    return pairs.join('&');
}

class slider {
    constructor(slider,slides=[],auto_change = 0) {
        this.slider = slider;
        slides.map(slide=>{
            let newSlide = document.createElement("img");
            newSlide.classList = "slide";
            newSlide.style.backgroundImage = `url('${slide}')`;
            this.slider.append(newSlide);
        })

        if(auto_change !== 0){
            this.interval = setInterval(()=>{
                this.slides.nextSlide();
            },auto_change)
        }

        this.activeSlide = 0;
        let prot = this;

        this.slides = {
            totalSlides: slider.getElementsByClassName("slides_wrapper")[0].children.length,
            nextSlide(){
                if(this.totalSlides-1 === prot.activeSlide){
                    prot.activeSlide = 0;
                }else{
                    prot.activeSlide++;
                }
                slider.getElementsByClassName("slides_wrapper")[0].style.right = prot.activeSlide*100+"%";
            },

            previousSlide(){

            }
        }
    }
}
function getFormData(form) {
    let formObj = typeof form === "string" ? document.getElementById(form) : form;
    let inputs = formObj.querySelectorAll("input");
    let data = {};
    inputs.forEach(input=>
    {
        if(input.type==="checkbox")
        {
            data[input.name] = input.checked;
        }
        else data[input.name] = input.value;

    });
    return data;
}
class Status
{
    constructor(container) {
        this.container = container;
        this.statusHTML = ` <div class="status" style="margin-bottom: 10px;">
            <img class="icon" src="/media/images/error.svg" alt="">
            <p></p>
        </div>`;
        this.container.insertAdjacentHTML("beforeend",this.statusHTML)
        this.status = this.container.querySelector(".status");
    }
    show(text)
    {
        this.status.querySelector("p").innerText = text;
        this.status.classList.add("active");
    }
    hide()
    {
        this.status.classList.remove("active");
    }
}
async function getGroupId() {
    return JSON.parse(await asyncQuery.GET({}, "/api/groupId")).id;
}
async function getPrice() {
    return JSON.parse(await asyncQuery.GET({},"/api/price")).price;
}