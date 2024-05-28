<?php include '/private/initialize.php'; ?><!-- or whatever your path to this file is -->
<?php include SHARED_PATH . '/public_header.php'; ?>
    <!-- Navigation -->
    <?php include SHARED_PATH . '/public_navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
		<h1>About This Project </h1>

<p>The public API used for this project is from the Open Library Book Covers API.</p>

<p>This project was completed on a ten-year old laptop running Windows 8.1.</p>

<p>Like other similar projects, this one has been inspired by Edwin Diaz and Kevin Skoglund.</p>

<p>Both the front- and backends were developed using my favorite version of Bootstrap (3.3.7). The admin template is also a favorite of mine, particularly version 2.4.2 for Bootstrap 3. And, yes, I have developed projects using later versions. Feel free to remove any unnecessary code from the templates.</p>

<p>I have decided to rebuild this project using the <a href="https://trongate.io" target="_blank">Trongate PHP Framework</a> by David Connelly and make this one available here. While it is (somewhat) production-ready, it does not have a LIVE admin backend (unless you choose to input data directly into phpMyAdmin. Of course, if you decide to use a login feature (eg), you may wish to consider implementing any necessary measures for preventing SQL injection attacks.</p>
<p>Overall site structure may need sorting out too.</p>

<p>If anyone is interested in taking the Node.js version further, you have my blessing.</p>
<p>Peace!</p>
<p>PS: Erm... you WILL make sure your version is FULLY production-ready, won't you?</p>

</div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include SHARED_PATH . '/public_footer.php'; ?>