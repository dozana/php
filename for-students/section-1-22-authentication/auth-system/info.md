# Step 1: Registration
Enter user data
/register.php

# Step 2: Activate Profile 
Check your email or spam folder for activation link.
/activate.php?email=levan@mail.com&code=dbd6e41b2e5a21976fa7b2b94a7b18a9

  confirm_code = dbd6e41b2e5a21976fa7b2b94a7b18a9
  active = 0

if code is right

  confirm_code = 0
  active = 1

# Step 3: Login
Enter email & password
/login.php


# Step 4: Forgot Password (send password)
Enter email
/recover.php

Before entering email
  confirm_code = 0
  active = 1

If email & token is correct

  confirm_code = ff6db20b51289bf5d9134aa6a1d8dcdd
  active = 1

Please check your email or spam folder for a password reset code.


# Step 5: Reset password 
/code.php?email=levan@mail.com&code=11081c2a1c97a27b7625ea1ba2be4702

  confirm_code = 11081c2a1c97a27b7625ea1ba2be4702
  active = 1

Enter code: 11081c2a1c97a27b7625ea1ba2be4702


# Step 6: 
If code is right it opens reset form



/reset.php (enter password and confirm password)



