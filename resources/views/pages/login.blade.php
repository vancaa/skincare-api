<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .back-btn {
            background: none;
            border: none;
            cursor: pointer;
            margin-right: 15px;
            font-size: 20px;
            color: #555;
        }
        
        .profile-container {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        h1 {
            color: #222;
            font-size: 24px;
            margin: 0;
        }
        
        .profile-pic-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }
        
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            background-color: #eee;
            margin-bottom: 10px;
        }
        
        .change-photo-btn {
            color: #1a73e8;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }
        
        h2 {
            color: #444;
            font-size: 18px;
            margin: 25px 0 15px 0;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }
        
        .profile-field {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }
        
        .field-label {
            width: 150px;
            font-weight: 500;
            color: #555;
        }
        
        .field-value {
            flex-grow: 1;
            font-weight: 500;
        }
        
        .action-btn {
            color: #1a73e8;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
            padding: 5px 10px;
            margin-left: 10px;
            border-radius: 4px;
        }
        
        .action-btn:hover {
            background-color: #f0f6ff;
        }
        
        .divider {
            height: 1px;
            background-color: #eee;
            margin: 25px 0;
        }
        
        .masked-email {
            display: inline-block;
            margin-right: 10px;
        }
        
        .verify-badge {
            background-color: #e6f4ea;
            color: #1e8e3e;
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: 500;
        }
        
        .not-set {
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="/home" class="back-btn">←</a>
        <h1>Edit Profile</h1>
    </div>
    
    <div class="profile-container">
        <!-- Foto Profil -->
        <div class="profile-pic-section">
<img src="assets/images/profile.png" class="profile-pic">
            <button class="change-photo-btn">Change Photo</button>
        </div>
        
        <h2>Top to Change</h2>
        
        <!-- Name -->
        <div class="profile-field">
            <div class="field-label">Name</div>
            <div class="field-value">Admin Vanessa</div>
            <button class="action-btn">Change</button>
        </div>
        
        <!-- Username -->
        <div class="profile-field">
            <div class="field-label">Username</div>
            <div class="field-value">Admin Vanessa</div>
            <button class="action-btn">Change</button>
        </div>
        
        <!-- Gender -->
        <div class="profile-field">
            <div class="field-label">Gender</div>
            <div class="field-value">Female</div>
            <button class="action-btn">Change</button>
        </div>
        
        <!-- Birthday -->
        <div class="profile-field">
            <div class="field-label">Birthday</div>
            <div class="field-value">06/05/1979</div>
            <button class="action-btn">Change</button>
        </div>
        
        <!-- Phone -->
        <div class="profile-field">
            <div class="field-label">Phone</div>
            <div class="field-value not-set">Not set</div>
            <button class="action-btn">Set Now</button>
        </div>
        
        <!-- Email -->
        <div class="profile-field">
            <div class="field-label">Email</div>
            <div class="field-value">
                <span class="masked-email">ad****@email.com</span>
                <span class="verify-badge">Verified</span>
            </div>
            <button class="action-btn">Change</button>
        </div>
        
        <!-- Social Media -->
        <div class="profile-field">
            <div class="field-label">Social Media Accounts</div>
            <div class="field-value not-set">Not connected</div>
            <button class="action-btn">Manage</button>
        </div>
        
        <div class="divider"></div>
        
        <h2>Set Password</h2>
        <div class="profile-field">
            <div class="field-label">Password</div>
            <div class="field-value">••••••••</div>
            <button class="action-btn">Change</button>
        </div>
    </div>

    <script>
        // Fungsi untuk back button
        document.querySelector('.back-btn').addEventListener('click', function() {
            window.location.href = '/home';
        });
        
        // Fungsi untuk ganti foto profil
        document.querySelector('.change-photo-btn').addEventListener('click', function() {
            alert('Fungsi ganti foto akan diimplementasikan di sini');
            // Di sini bisa ditambahkan logika untuk upload foto
        });
    </script>
</body>
</html>