<?php
$config = require __DIR__.'/includes/config.php';
$errors = [];
$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $name = trim(substr(htmlspecialchars($_POST['name'] ?? ''),0,200));
  $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
  $msg = trim(substr(htmlspecialchars($_POST['message'] ?? ''),0,2000));
  if (!$name) $errors[] = 'Please enter your name';
  if (!$email) $errors[] = 'Please enter a valid email';
  if (!$msg) $errors[] = 'Please write a message';
  if (empty($errors)){
    $to = $config['contact_email'];
    $subj = "MAKNA Contact: $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$msg";
    $headers = "From: {$config['from_email']}\r\nReply-To: $email\r\n";
    if (@mail($to,$subj,$body,$headers)){
      $sent = true;
    } else {
      // fallback: append to log
      file_put_contents(__DIR__.'/contacts.log', date('Y-m-d H:i:s')." | $name | $email | ".str_replace("\n"," ",$msg)."\n", FILE_APPEND);
      $sent = true;
    }
  }
}
?>
<?php include __DIR__.'/includes/header.php'; ?>
<div class="container page">
  <h2>Contact & Order</h2>
  <form id="igOrderForm">
    <input type="text" id="name" placeholder="Your Name" required>
    <input type="text" id="product" placeholder="Product Name" required>
    <textarea id="notes" placeholder="Additional Notes (optional)"></textarea>
    <button type="submit" class="btn">Send via Instagram DM</button>
  </form>
</section>
  </form>
  <p class="cta-text">Ready to grab your favorite scent? DM us to order now!</p>
</div>
<?php include __DIR__.'/includes/footer.php'; ?>
