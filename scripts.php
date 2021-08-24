<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-functions.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-analytics.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyDNXS1qKC4Bt2EQnwWudRZmKZLAiNVHzEg",
        authDomain: "travellopia.firebaseapp.com",
        projectId: "travellopia",
        storageBucket: "travellopia.appspot.com",
        messagingSenderId: "457516623175",
        appId: "1:457516623175:web:a20f601f938d09f3191862",
        measurementId: "G-072QXYFK7S"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    const auth = firebase.auth();
    const db = firebase.firestore();
    const functions = firebase.functions();

    db.settings({
        timestampInSpanshots: true
    });
</script>

<script>
    const loggedOutLinks = document.querySelectorAll('.logged-out');
    const loggedInLinks = document.querySelectorAll('.logged-in');
    const accountDetails = document.querySelector('.account-details');
    
    const setupNavLinks = (user) => {
        if (user) {
            db.collection('users').doc(user.uid).get().then(doc => {
                const html = `Hi, ${doc.data().name}!&emsp;`;
                accountDetails.innerHTML = html;
            });
            accountDetails.style.display = 'block';
            loggedInLinks.forEach(item => item.style.display = 'block');
            loggedOutLinks.forEach(item => item.style.display = 'none');
        } else {
            // toggle user elements
            accountDetails.innerHTML = '';
            loggedInLinks.forEach(item => item.style.display = 'none');
            loggedOutLinks.forEach(item => item.style.display = 'block');
        }
    };
</script>
<script src="./scripts/styles.js"></script>
<script src="./scripts/auth.js"></script>