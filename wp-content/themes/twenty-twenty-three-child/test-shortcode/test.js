const backButton = document.getElementById("back-button");
const restartButton = document.getElementById("restart-button");
const sendButton = document.getElementById("send-button");

const form1 = document.getElementById("form1");
const form2 = document.getElementById("form2");

const dataTest = {};

const widgetTest = {
    step: 1,
    oldStep: 1,
    menuIteams: document.getElementsByClassName("menu-iteam"),

    whatStep: function () {
        for (let i = 1; i < this.menuIteams.length; i++) {
            if (this.menuIteams[i].classList.contains("active-iteam")) {
                this.oldStep = i;
                this.menuIteams[i].classList.remove("active-iteam");
            }
        }
    },
    nextStep: function () {
        this.step += 1;
    },
    prevStep: function () {
        this.step -= 1;
    },
    showButtons: function () {
        if (this.step === 1) {
            document.getElementById("back-button").style.display = "none";
            document.getElementById("restart-button").style.display = "none";
            document.getElementById("step1-button").style.display = "block";
        }
        if (this.step === 2) {
            document.getElementById("back-button").style.display = "block";
            document.getElementById("send-button").style.display = "none";
            document.getElementById("step1-button").style.display = "none";
            document.getElementById("step2-button").style.display = "block";
        }
        if (this.step === 3) {
            document.getElementById("send-button").style.display = "block";
            document.getElementById("step2-button").style.display = "none";
        }
        if (this.step === 4) {
            document.getElementById("send-button").style.display = "none";
            document.getElementById("back-button").style.display = "none";
            document.getElementById("restart-button").style.display = "block";
        }
    },
    changeStep: function () {
        document.getElementById(`step-${this.oldStep}`).style.display = "none";

        this.menuIteams[this.step].classList.add("active-iteam");
        document.getElementById(`step-${this.step}`).style.display = "block";
    },
    clearInput: function () {
        document.getElementById("form1").reset();
        document.getElementById("form2").reset();
    },
    newStep: function () {
        this.whatStep();
        this.changeStep();
        this.showButtons();
    },
};

backButton.addEventListener("click", () => {
    widgetTest.prevStep();
    widgetTest.newStep();
});
restartButton.addEventListener("click", () => {
    widgetTest.step = 1;
    widgetTest.clearInput();
    widgetTest.newStep();
});

form1.addEventListener("submit", (e) => {
    e.preventDefault();

    let email = document.getElementById("email");
    email.classList.remove("req");

    if (!email.value) {
        email.classList.add("req");
        return false;
    }

    dataTest.name = form1.name.value;
    dataTest.email = form1.email.value;
    dataTest.phone = form1.phone.value;

    widgetTest.nextStep();
    widgetTest.newStep();
});
form2.addEventListener("submit", (e) => {
    e.preventDefault();

    let quantity = document.getElementById("quantity");
    quantity.classList.remove("req");

    if (!quantity.value || quantity.value < 0 || quantity.value > 1000) {
        quantity.classList.add("req");
        console.log("Erroe 4");
        return false;
    }

    let quantityValue = form2.quantity.value;
    if (quantityValue > 0 && quantityValue <= 10) {
        dataTest.price = 10;
    }
    if (quantityValue > 10 && quantityValue <= 100) {
        dataTest.price = 100;
    }
    if (quantityValue > 100 && quantityValue <= 1000) {
        dataTest.price = 1000;
    }

    document.getElementById("test-price").innerHTML = dataTest.price + "$";

    widgetTest.nextStep();
    widgetTest.newStep();
});

sendButton.addEventListener("click", function (e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open(
        "POST",
        "http://www.polanika.space/wp-content/themes/twenty-twenty-three-child/test-shortcode/sendmail.php"
    );
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("param=" + JSON.stringify(dataTest));

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                try {
                    document.getElementById("answer-server").innerHTML =
                        JSON.parse(xhr.response).message;
                } catch (error) {
                    document.getElementById("answer-server").innerHTML =
                        "&#x26A0; We cannot send you email right now. Use alternative way to contact us";
                }
            } else console.log("Error ajax");
        }
    };
    widgetTest.nextStep();
    widgetTest.newStep();
});
