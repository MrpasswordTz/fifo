vapor# Laravel Vapor CLI Usage and Team Access Guide

This document provides instructions to access and use the Laravel Vapor CLI with the correct team context.

## Prerequisites

-   Laravel Vapor CLI installed globally:

    ```
    composer global require laravel/vapor-cli
    ```

-   You must have an active Laravel Vapor account and be a member of the team you want to use.

## Logging In

1. Run the login command:
    ```
    vapor login
    ```
    This will open a browser window for authentication. Complete the login process.

## Managing Teams

2. List all teams you belong to:

    ```
    vapor team:list
    ```

    This will display all teams associated with your account.

3. Set the current team context:

    ```
    vapor team:use your-team-name
    ```

    Replace `your-team-name` with the exact team name from the list.

4. Verify the current team:
    ```
    vapor team:current
    ```

## Deploying Your Application

Once the correct team is set, you can deploy your application:

```
vapor deploy production
```

Replace `production` with your desired environment.

## Troubleshooting

-   If you encounter errors about the requested resource not existing, ensure you have selected the correct team using the steps above.

-   If login issues persist, try logging out and logging back in:
    ```
    vapor logout
    vapor login
    ```

## Additional Resources

-   [Laravel Vapor Documentation](https://vapor.laravel.com/docs)
-   [Laravel Vapor CLI GitHub](https://github.com/laravel/vapor-cli)

This guide should help you manage Vapor CLI access and team context effectively.
