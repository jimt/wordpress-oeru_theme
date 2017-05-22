=OERu Course Wordpress Theme=

This is for noting down things we need to do with this theme.

==Login/Registration==
- Registration can either mean: associating an existing WP user with a new course, OR creating a new WP user and associating it with a course. We have to reconcile the Wordpress Multisite user model: a single user who can be associated with multiple "course sites". Some data (username, password, email, display name, country of origin) are probably pan-course, others (course blog url) might be per-course. We need to ensure that a learner signing up for a course doesn't inadvertently create a new account if they've already got an account associated with a different course. We need to test the matching of users based on email address and/or username.
- tune help information depending on modal context (e.g. Login, Register, or Update/Logout)
- make the enter key do the right thing (submitting the form via the highlighted button)
- we should probably enable the email verification workflow for new Wordpress accounts generated via the registration process.
