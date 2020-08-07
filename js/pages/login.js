class Login
{
    constructor(loginForm) {
        this.loginForm = loginForm;
        this.status = new Status(this.loginForm);
        loginForm.addEventListener("submit",async (e)=>{
            this.status.hide();
            e.preventDefault();
            let data = getFormData(this.loginForm);
            let response = await asyncQuery.POST(data,"/api/auth",true);
            if(response.code===1)
            {
                let date = new Date(Date.now());
                date.setMonth(new Date(Date.now()).getMonth()+1);
                date = date.toUTCString();
                document.cookie = `login=${data.login}; expires=${date}`;
                document.cookie = `token=${data.token}; expires=${date}`;
                location.href = "/apanel";
            }
            this.status.show(response.message);
        });
    }
}