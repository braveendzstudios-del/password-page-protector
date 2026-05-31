# Password Page Protector

A lightweight WordPress plugin that protects selected pages and posts behind a password page.

## Features

- Protect a specific page or post
- Redirect visitors to a custom password page
- AJAX password validation
- Redirect users back to the requested content after successful authentication
- Separate access handling for pages and posts
- Password visibility toggle
- Uses WordPress nonces for security

## Installation

1. Upload the plugin folder to:

   wp-content/plugins/

2. Activate the plugin from the WordPress Admin Dashboard.

3. Configure:
   - Protection Page
   - Protected Page
   - Protected Post
   - Password

## How It Works

1. User visits a protected page or post.
2. Plugin redirects them to the password page.
3. User enters the correct password.
4. Access is granted.
5. User is redirected back to the originally requested content.

## Requirements

- WordPress 6.0+
- PHP 7.4+

## Version

Current Version: 1.0.0

## Author

Your Name

## License

GPL v2 or later