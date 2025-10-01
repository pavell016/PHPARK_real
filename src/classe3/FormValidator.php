<?php
declare(strict_types=1);

namespace ex1;

class FormValidator
{
    private array $errors = [];

    /**
     * Retorna els errors
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * Executa totes les validacions
     */
    public function validate(): bool
    {
        $this->UsuariValid();
        $this->EmailValid();
        return empty($this->errors);
    }

    /**
     * Neteja una entrada
     */
    private function clean($value): string
    {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Valida l'usuari
     */
    private function UsuariValid(): void
    {
        $username = $_POST['username'] ?? '';
        $username = $this->clean($username);

        if (!empty($username)) {
            // Només lletres (sense números ni símbols)
            if (!preg_match('/^[a-zA-Z]+$/', $username)) {
                $this->errors['username'] = "L'usuari només pot contenir lletres";
            }
        } else {
            $this->errors['username'] = "El camp usuari és obligatori";
        }
    }

    /**
     * Valida l'email
     */
    private function EmailValid(): void
    {
        $email = $_POST['email'] ?? '';
        $email = $this->clean($email);

        if (!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = "El correu no és vàlid";
            }
        } else {
            $this->errors['email'] = "El camp email és obligatori";
        }
    }
}
