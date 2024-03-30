function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;

    if (password !== confirmPassword) {
      alert("Passwords do not match");
      return false;
    }

    return true;
  }

  function togglePasswordVisibility(inputId) {
    var input = document.getElementById(inputId);
    var type = input.getAttribute("type");

    if (type === "password") {
      input.setAttribute("type", "text");
    } else {
      input.setAttribute("type", "password");
    }
  }

  function checkPasswordStrength() {
        var password = document.getElementById('password').value;
        var strengthFill = document.getElementById('strength-fill');

        // Define the criteria for password strength
        var hasLowerCase = /[a-z]/.test(password);
        var hasUpperCase = /[A-Z]/.test(password);
        var hasDigit = /\d/.test(password);
        var hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password);

        // Calculate the strength based on the criteria
        var strength = 0;
        if (hasLowerCase) strength++;
        if (hasUpperCase) strength++;
        if (hasDigit) strength++;
        if (hasSpecialChar) strength++;

        // Update the width of the strength-fill based on the strength
        var fillWidth = (strength / 4) * 100;
        strengthFill.style.width = fillWidth + '%';

        // Update the color of the strength-fill based on the strength
        if (password.length < 8 || strength === 0) {
            strengthFill.className = 'weak';
        } else if (password.length < 12 || strength === 1) {
            strengthFill.className = 'medium';
        } else {
            strengthFill.className = 'strong';
        }
    }

  
    function copyParagraphContent() {
        // Get the text from the paragraph
        var paragraphContent = document.getElementById('paragraphContent').innerText;

        // Create a temporary textarea element
        var tempTextArea = document.createElement('textarea');
        tempTextArea.value = paragraphContent;

        // Append the textarea to the document
        document.body.appendChild(tempTextArea);

        // Select the text in the textarea
        tempTextArea.select();
        tempTextArea.setSelectionRange(0, 99999); // For mobile devices

        // Copy the selected text to the clipboard
        document.execCommand('copy');

        // Remove the temporary textarea
        document.body.removeChild(tempTextArea);

        // Provide some feedback to the user 
        //alert('Paragraph content copied to clipboard!');
    }