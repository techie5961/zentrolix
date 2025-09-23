<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emerald Green Dark Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
    <link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          font-family:'poppins';
        }

        body {
            background-color: #0a0a0a;
            color: #e0e0e0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background: #121212;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #047857 0%, #064e3b 100%);
            padding: 25px 30px;
            text-align: center;
            position: relative;
        }

        .header h1 {
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 20px;
            background: linear-gradient(135deg, #047857 0%, #064e3b 100%);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0);
            opacity: 0.7;
        }

        .form-body {
            padding: 10px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .col-6 {
            flex: 0 0 50%;
            padding: 0 15px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
            color: #a0a0a0;
        }

        .input-group input, .input-group select {
            width: 100%;
            padding: 14px 15px;
            background: #1e1e1e;
            border: 2px solid #2d2d2d;
            border-radius: 8px;
            color: #e0e0e0;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .input-group input:focus, .input-group select:focus {
            border-color: #10b981;
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 42px;
            color: #10b981;
            font-size: 18px;
        }

        .capital-section {
            background: #1a1a1a;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #10b981;
        }

        .capital-section h3 {
            margin-bottom: 15px;
            color: #10b981;
            font-size: 18px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #10b981 0%, #047857 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #047857 0%, #10b981 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        @media (max-width: 768px) {
            .col-6 {
                flex: 0 0 100%;
            }
            
            .container {
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
           <img src="{{ asset('logo.png?v=1.1') }}" class="w-half" alt="">
            <p>Please fill in all the required details</p>
        </div>
        <div class="bg-gold-transparent m-10 p-10 br-10">
            <b> ⚠️ Important Notice <br></b>
           <i>
               
             Please ensure that your bank details, user ID, phone number, as well as all other details are entered correctly when filling out the form to avoid delays or loss of funds.<br>
             
                Only users who have not yet recovered their full capital, or none at all, from the assets they previously invested in on Zentrolix are eligible for a refund.
           </i>

        </div>
        
        <div class="form-body">
            <form method="post" onsubmit="PostRequest(event,this,Submitted)" action="{{ url('post/submit/request/process') }}" id="userForm">
                <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <div class="row">
                
                    <div class="col-6">
                        <div class="input-group">
                            
                            <label for="fullname">USER FULL NAME</label>
                            <input class="input" type="text" id="fullname" name="name" required>
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="referred">REFERRED BY</label>
                            <input  class="input" type="text" id="referred" name="referred_by">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="username">USERNAME (ID)</label>
                            <input  class="input" type="text" id="username" name="username" required>
                            <i class="fas fa-at"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="phone">PHONE NUMBER</label>
                            <input  class="input" type="tel" id="phone" name="phone" required>
                            <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="email">EMAIL ADDRESS</label>
                            <input  class="input" type="email" id="email" name="email" required>
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="country">COUNTRY</label>
                            <select  class="input" id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="nigeria">Nigeria</option>
                                <option value="ghana">Ghana</option>
                                <option value="cameroon">Cameroon</option>
                                
                            </select>
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="asset">ASSET USER</label>
                           
                            <input  class="input" type="text" id="asset" name="asset" required>
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
                
                <div class="capital-section">
                    <h3><i class="fas fa-wallet"></i> Capital Information</h3>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group">
                                <label for="invested">CAPITAL AMOUNT INVESTED</label>
                                <input  class="input" type="number" id="invested" name="invested" required>
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="input-group">
                                <label for="withdrawn">AMOUNT WITHDRAWN</label>
                                <input  class="input" type="number" id="withdrawn" name="withdrawn" required>
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="input-group">
                                <label for="remaining">CAPITAL AMOUNT REMAINING</label>
                                <input  class="input" type="number" id="remaining" name="remaining" required>
                                <i class="fas fa-coins"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <label for="bank">BANK NAME</label>
                            <input  class="input" type="text" id="bank" name="bank_name" required>
                            <i class="fas fa-university"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="account">ACCOUNT NUMBER</label>
                            <input  class="input" type="text" id="account" name="account_number" required>
                            <i class="fas fa-credit-card"></i>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group">
                            <label for="holder">ACCOUNT HOLDER NAME</label>
                            <input  class="input" type="text" id="holder" name="account_name" required>
                            <i class="fas fa-signature"></i>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Submit Information
                </button>
            </form>
        </div>
    </div>
     <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    <script>
        // document.getElementById('userForms').addEventListener('submit', function(e) {
        //     e.preventDefault();
            
        //     // Calculate remaining amount if not set
        //     const invested = parseFloat(document.getElementById('invested').value) || 0;
        //     const withdrawn = parseFloat(document.getElementById('withdrawn').value) || 0;
        //     const remainingField = document.getElementById('remaining');
            
        //     if (invested > 0 && remainingField.value === '') {
        //         remainingField.value = invested - withdrawn;
        //     }
            
        //     // Show success message
        //     alert('Form submitted successfully!');
        // });

        // Auto-calculate remaining amount when invested or withdrawn changes
        document.getElementById('invested').addEventListener('blur', calculateRemaining);
        document.getElementById('withdrawn').addEventListener('blur', calculateRemaining);
        
        function calculateRemaining() {
            const invested = parseFloat(document.getElementById('invested').value) || 0;
            const withdrawn = parseFloat(document.getElementById('withdrawn').value) || 0;
            document.getElementById('remaining').value = invested - withdrawn;
        }
        function Submitted(response){
            if(JSON.parse(response).status == 'success'){
                document.querySelector('form').reset();
            }
        }
    </script>

</body>
</html>