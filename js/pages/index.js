class MainForm
{
    constructor(form,robuxAviable,groupLink,robuxCourseText,robuxText,rublesText,payBtn) {
        // Получаем все нужные элементыф
        this.form = form;
        this.groupLink = groupLink;
        this.robuxCourseText = robuxCourseText;
        this.robuxAviable = robuxAviable;
        this.robuxText = robuxText;
        this.rublesText = rublesText;
        this.payBtn = payBtn;
        this.robuxText.addEventListener("input",()=>{
            this.checkAviablity(+this.robuxText.value);
            this.rublesText.value = Math.ceil(this.robuxText.value/this.course);
        });
        this.rublesText.addEventListener("input",()=>{
            this.robuxText.value = Math.floor(this.rublesText.value*this.course);
            this.checkAviablity(+this.robuxText.value);
        });
        // Добавляем событие при отправке формы
        this.form.addEventListener("submit", async (e)=>{
            e.preventDefault();
            let data = getFormData(this.form);
            if(this.aviablity)
            {
                let response = JSON.parse(await asyncQuery.GET({name:data.name,amount:data.rubles},"/api/create-pay"));
                if(response.code===1)
                {
                    location.href = response.query;
                }
                else this.payBtn.innerText = response.message;
            }
            else
            {
                this.payBtn.innerText = "Отсутствуют робаксы";
            }

        });

        // Получаем необходимые значения
        this.setGroupLink();
        this.getRobuxCount();
        this.setPrice();
    }
    async getRobuxCount()
    {
        let response = JSON.parse(await asyncQuery.GET({},"/api/robuxAmount"));
        if(response.code===1)
        {
            // Устанваливаем доступное кол-во робаксов
            this.robuxAviable.innerText = `${response.amount} R`;
        }
    }
    async setGroupLink()
    {
        // Устанавливаем ссылку на группу
        this.groupLink.href = `https://www.roblox.com/groups/${await getGroupId()}`;
    }
    async setPrice()
    {
        this.course = await getPrice();
        this.robuxCourseText.innerText = `1P = ${this.course}R`;
    }
    checkAviablity(value)
    {
        if(value>+parseInt(this.robuxAviable.innerText))
        {
            this.aviablity = false;
            this.robuxText.style.border = "1px solid red";
        }
        else
        {
            this.aviablity = true;
            this.robuxText.style.border = "1px solid transparent";
        }
    }
}