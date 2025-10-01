<?php

/**
 * Classe per validar i sanejar formularis.
 * Separa la lògica del fitxer principal i la fa reutilitzable.
 */

declare(strict_types=1);

namespace App;

class FormValidator
{
    private array $data;
    private array $errors = [];
    private array $old = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->sanitize();
    }

    /**
     * Retorna els errors
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * Retorna els valors "sticky"
     */
    public function old(): array
    {
        return $this->old;
    }

    /**
     * Fa la validació i retorna true/false
     */
    public function validate(): bool
    {
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();
        $this->validateGender();
        $this->validateInterests();

        return empty($this->errors);
    }

    private function sanitize(): void
    {
        $this->old['username']  = isset($this->data['username']) ? $this->clean($this->data['username']) : '';
        $this->old['email']     = isset($this->data['email']) ? $this->clean($this->data['email']) : '';
        $this->old['gender']    = isset($this->data['gender']) ? $this->clean($this->data['gender']) : '';
        $this->old['interests'] = isset($this->data['interests']) && is_array($this->data['interests'])
            ? array_map(fn($v) => $this->clean($v), $this->data['interests'])
            : [];
        // password no es fa sticky
        $this->data['password'] = $this->data['password'] ?? '';
    }

    private function clean(string $val): string
    {
        return htmlspecialchars(stripslashes(trim($val)), ENT_QUOTES, 'UTF-8');
    }

    private function validateUsername(): void
    {
        $username = $this->old['username'];
        if ($username === '') {
            $this->errors['username'] = 'Username is required.';
        } elseif (mb_strlen($username) < 2) {
            $this->errors['username'] = 'At least 2 characters.';
        }
    }

    private function validateEmail(): void
    {
        $email = $this->old['email'];
        if ($email === '') {
            $this->errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format.';
        }
    }

    private function validatePassword(): void
    {
        $pwd = $this->data['password'];
        if ($pwd === '') {
            $this->errors['password'] = 'Password is required.';
        } elseif (strlen($pwd) < 8) {
            $this->errors['password'] = 'Minimum 8 characters.';
        }
    }

    private function validateGender(): void
    {
        $g = $this->old['gender'];
        $allowed = ['male', 'female'];
        if ($g === '') {
            $this->errors['gender'] = 'Select a gender.';
        } elseif (!in_array($g, $allowed, true)) {
            $this->errors['gender'] = 'Invalid gender.';
        }
    }

    private function validateInterests(): void
    {
        $allowed = ['computing', 'web'];
        $invalid = array_diff($this->old['interests'], $allowed);
        if (!empty($invalid)) {
            $this->errors['interests'] = 'Invalid interest.';
        }
    }
}
