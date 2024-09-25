<?php

class Validation {
    private $errors = [];

    public function required($inputName, $input)
    {
        if (empty($input)) {
            $this->addError($inputName, "This field is required.");
        }
    }

    public function maxVal($inputName, $input, $lengthVal)
    {
        if (strlen($input) > $lengthVal) {
            $this->addError($inputName, "Must be less than or equal to $lengthVal characters.");
        }
    }

    public function minVal($inputName, $input, $lengthVal)
    {
        if (strlen($input) < $lengthVal) {
            $this->addError($inputName, "Must be at least $lengthVal characters.");
        }
    }

    public function validateEmailFormat($inputName, $input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $this->addError($inputName, "Invalid email format.");
        }
    }

    public function validateEmailRegex($inputName, $input)
    {
        $regex = "/^[\w\.\-]+@[\w\.\-]+\.\w+$/";
        if (!preg_match($regex, $input)) {
            $this->addError($inputName, "Invalid email format.");
        }
    }

    public function URL($inputName, $input)
    {
        if (!filter_var($input, FILTER_VALIDATE_URL)) {
            $this->addError($inputName, "Invalid URL format.");
        }
    }


    public function numeric($inputName, $input)
    {
        if (!is_numeric($input)) {
            $this->addError($inputName, "Must be a numeric value.");
        }
    }

    public function alpha($inputName, $input)
    {
        $regex = "/^[a-zA-Z\s]+$/";
        if (!preg_match($regex, $input)) {
            $this->addError($inputName, "Must contain only letters and spaces.");
        }
    }    

    public function alphaNumeric($inputName, $input)
    {
        $regex = "/^[a-zA-Z0-9]+$/";
        if (!preg_match($regex, $input)) {
            $this->addError($inputName, "Must contain only letters and numbers.");
        }
    }

    public function matchInput($inputName, $input, $matchInput)
    {
        if ($input != $matchInput) {
            $this->addError($inputName, "Must match the specified input.");
        }
    }

    public function validatePasswordRegex($inputName, $input, $regex)
    {
        if (!preg_match($regex, $input)) {
            $this->addError($inputName, "Password does not meet complexity requirements.");
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function addError($inputName, $errorMessage)
    {
        if (!isset($this->errors[$inputName])) {
            $this->errors[$inputName] = $errorMessage;
        }
    }
}
