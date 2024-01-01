<x-mail::message>
# EduSync

Dear {!! $user->name !!},

Thank you for registering with EduSync. To ensure the security of your account,
 please verify your email address and proceed to set your password.

<x-mail::button :url="$url">
Verify and Set Password
</x-mail::button>

If you did not register for an account with EduSync, please disregard this email.

Best regards,<br>
EduSync
</x-mail::message>
