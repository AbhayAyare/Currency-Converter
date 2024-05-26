<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Currency Converter</title>
</head>
<style>
*{
    padding: 0;
    margin: 0;
}
body{
  background-color: aqua;
}
.border{
    border: 2px solid #FFFFFF;
}

.quantity_currency{
  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

.contener{
    height: max-content;
    background-color: rgb(55, 208, 195);
    margin:auto;
    padding: 2rem;
    display: flex;
}
.hbutton{
  display: flex;
  gap: 40px;
  padding-left: 60%;
}


.Hero{
    padding-top: 3rem;
    height: 39rem;
    text-align: center;
    
}

.currency{
    width: 6rem;
    height: 30px;
}

.btn {
  position: relative;
  background-color: #432bda;
  border: none;
  font-size: 11px;
  color: #FFFFFF;
  padding: 20px;
  width: 150px;
  text-align: center;
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.btn:hover {background-color: #0e3493}

.btn:active {
  background-color: #062d47;
  box-shadow: 0 5px #082ab4;
  transform: translateY(4px);
}

.btn{border-radius: 8px;}

.Logic{
    margin: auto;
    padding-top: 70px;
    padding-bottom: 20px;
}

.Home, .Privacy, .Contact {
           background: none;
           border: none;
           align-self: center;
        }
.border1:hover{
  padding: 2px;
  border: 2px solid black;
}

.content-section {
            display: none;
            padding: 20px;
            background-color: #f9f9f9;
            margin: 20px auto;
            width: 80%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .active {
            display: block;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }
            .hbutton {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
                margin-top: 10px;
            }
            .hbutton button {
                width: 100%;
            }
        }
        @media (max-width: 480px) {
            .container {
                padding: 1rem;
            }
            .currency {
                width: 100%;
            }
        }
        


</style>
<script>
       function showContent(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
            document.querySelector('.Hero').style.display = 'none'; // Hide Hero section
        }

        function showHero() {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.querySelector('.Hero').style.display = 'block'; // Show Hero section
        }
    </script>


<body>
    <header>
        <div class="contener border">
          <h1> Currency Converter</h1>
          <div class="hbutton">
          <button class="Home border1" onclick="showHero()"><i class="fa fa-home"></i> Home</button>
                <button class="Privacy border1" onclick="showContent('privacy')">Privacy</button>
                <button class="Contact border1" onclick="showContent('contact')">Contact Me</button>
            
          </div>
        </div>
    </header>

    <!-- ///////////////Hero////////////////// -->

    <div class="Hero">
        <h1>Currency Converter</h1>
        <div class="Logic">
            <form method="POST" action="">
                <label>
                    <h2>Enter a Amount</h2>
                </label>
                <br>
                <input type="number" name="amount" class="quantity_currency" required>
                <br><br>
                <select name="from_currency" class="currency">
                    <option value="INR">INR</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
                <select name="to_currency" class="currency">
                    <option value="INR">INR</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
                <br><br>
                <button type="submit" class="btn">Convert</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $amount = $_POST['amount'];
                $from_currency = $_POST['from_currency'];
                $to_currency = $_POST['to_currency'];

                // Define conversion rates
                $rates = array(
                    "INR" => array("USD" => 0.012, "EUR" => 0.011),
                    "USD" => array("INR" => 83.00, "EUR" => 0.92),
                    "EUR" => array("INR" => 90.00, "USD" => 1.09),
                );

                if ($from_currency == $to_currency) {
                    $converted_amount = $amount;
                } else {
                    $converted_amount = $amount * $rates[$from_currency][$to_currency];
                }

                echo "<br>";
                echo "<h2>Converted Amount: " . number_format($converted_amount, 2) . " $to_currency</h2>";
            }
            ?>
        </div>
    </div>

    <div id="privacy" class="content-section">
        <h2>Privacy Policy</h2>
        <p>We value your privacy and are committed to protecting your personal information. This policy outlines how we collect, use, and safeguard your data.</p>
        <p><strong>Information Collection:</strong> We collect information you provide directly to us, such as when you create an account, fill out a form, or contact us for customer support. This may include your name, email address, and any other information you choose to provide.</p>
        <p><strong>Information Use:</strong> We use the information we collect to operate, maintain, and improve our services, process transactions, send you communications, and respond to your inquiries.</p>
        <p><strong>Information Sharing:</strong> We do not share your personal information with third parties except as described in this policy or with your consent. We may share information with vendors, consultants, and other service providers who need access to such information to carry out work on our behalf.</p>
        <p><strong>Data Security:</strong> We take reasonable measures to protect your personal information from unauthorized access, use, or disclosure. However, no internet or email transmission is ever fully secure or error-free. Please keep this in mind when disclosing any information to us.</p>
        <p>If you have any questions about this privacy policy, please contact us at [your contact information].</p>
    </div>

    <div id="contact" class="content-section">
        <h2>Contact Me</h2>
        <p>If you have any questions, comments, or concerns, please feel free to contact me using the information below:</p>
        <p><strong>Email:</strong> abhayayare007@gmail.com</p>
        <p><strong>Phone:</strong> +91 7219690903</p>
        <p><strong>Address:</strong> kolhapur, maharashtra </p>
        <p>You can also reach out through the contact form on this website. I strive to respond to all inquiries within 48 hours.</p>
    </div>
</body>
</html>
