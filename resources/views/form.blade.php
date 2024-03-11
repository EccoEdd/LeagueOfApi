<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        form {
            width: 300px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 10px);
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ccc; /* Cambio de color a gris */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #bbb; /* Cambio de color a gris más oscuro */
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ url()->temporarySignedRoute('last-auth', now()->addMinutes(10), ['id' => $id]) }}" id="myForm">
        @csrf
        <label for="code">Please insert the code:</label><br>
        <input type="text" id="code" name="code" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, ''); validateInput()" pattern="[0-9]{6}" title="Please enter exactly 6 numeric characters" required><br><br>
        <button type="submit" id="submitButton" disabled>Send</button>
    </form>

    <script>
        function validateInput() {
            var codeInput = document.getElementById('code');
            var submitButton = document.getElementById('submitButton');
            
            if (codeInput.value.trim().length === 6) {
                submitButton.style.backgroundColor = '#4CAF50'; /* Cambio de color a verde */
                submitButton.disabled = false;
            } else {
                submitButton.style.backgroundColor = '#ccc'; /* Cambio de color a gris */
                submitButton.disabled = true;
            }
        }
    </script>
</body>
</html>
