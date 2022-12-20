<h2>Contact</h2>

<div class="m-4 ms-0">
    <?= get('message'); ?>
</div>


<form action="/pages/forms/contact.php" method="post" role="form">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter the subject">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter your message"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>

</form>