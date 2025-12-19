const basicSub = document.getElementById('basic-subs');
const premiumSub = document.getElementById('premium-subs');
const goldSubs = document.getElementById('gold-subs');
const StoredEmail = localStorage.getItem('user');
const email = StoredEmail ? JSON.parse(StoredEmail) : null;

basicSub.addEventListener('click', () => {

  axios.post(`http://localhost:8000/api/subscription`,{
     level: 'basic',
     amount: 199,
     email: email
  }).then(response => {
     console.log(response.data);
     alert('Subscription successful!');
  }).catch(error => {
     console.error('There was an error!', error);
     alert('Subscription failed. Please try again.');
  });

});


premiumSub.addEventListener('click', () => {

  axios.post(`http://localhost:8000/api/subscription`,{
     level: 'premium',
     amount: 499,
     email: email
  }).then(response => {
     console.log(response.data);
     alert('Subscription successful!');
  }).catch(error => {
     console.error('There was an error!', error);
     alert('Subscription failed. Please try again.');
  });

});


goldSubs.addEventListener('click', () => {

  axios.post(`http://localhost:8000/api/subscription`,{
     level: 'gold',
     amount: 3999,
     email: email
  }).then(response => {
     console.log(response.data);
     alert('Subscription successful!');
  }).catch(error => {
     console.error('There was an error!', error);
     alert('Subscription failed. Please try again.');
  });

});
