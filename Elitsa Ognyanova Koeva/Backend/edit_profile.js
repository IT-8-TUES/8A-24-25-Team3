//function to handle UI updates
function updateUI(message, isSuccess = true) {
    const messageDiv = document.getElementById('message');
    messageDiv.style.color = isSuccess ? '#00ff88' : 'red';
    messageDiv.textContent = message;
}

//function to update profile picture display
function updateProfilePicture(filename) {
    const profilePic = document.getElementById('profilePic');
    const noPicMsg = document.getElementById('noPicMsg');
    
    profilePic.src = 'uploads/' + filename + '?t=' + Date.now();
    profilePic.style.display = '';
    noPicMsg.style.display = 'none';
}

//function to handle file upload
async function uploadProfilePicture(file) {
    const formData = new FormData();
    formData.append('profile_pic', file);
    
    const response = await fetch('upload_profile_pic.php', {
        method: 'POST',
        body: formData
    });
    
    return await response.json();
}

//main form submission handler
async function handleFormSubmit(e) {
    e.preventDefault();
    
    const fileInput = document.getElementById('profileInput');
    if (!fileInput.files.length) return;
    
    updateUI('Uploading...', true);
    
    try {
        const data = await uploadProfilePicture(fileInput.files[0]);
        
        if (data.success) {
            updateUI('Profile picture updated!', true);
            updateProfilePicture(data.filename);
        } else {
            updateUI(data.error || 'Upload failed.', false);
        }
    } catch (err) {
        updateUI('An error occurred.', false);
    }
}

//adds event listener to form
document.getElementById('profileForm').addEventListener('submit', handleFormSubmit); 