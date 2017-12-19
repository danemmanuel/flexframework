<?php
$tituloPagina = 'Termos e Privacidade';
$bodyID = 'termoseprivacidade';
include 'partes/head.php';
?>
<!--
<ul id="menu">
	<li data-menuanchor="firstPage" class="active"><a href="#firstPage">First slide</a></li>
	<li data-menuanchor="secondPage"><a href="#secondPage">Second slide</a></li>
	<li data-menuanchor="3rdPage"><a href="#3rdPage">Third slide</a></li>
</ul>
-->
<style>
	.navigation{
		display: none;
	}
</style>
<div id="fullpage">

	<div class="section section-1" id="home" data-section-name="home">
		
		<div class="content centred">
			<div class="text">
				<div class="titlet">
					Termos e Privacidade
				</div>
				<h1>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit temporibus sint adipisci nulla, sed ducimus perspiciatis voluptatem quos fuga, perferendis id explicabo consectetur voluptatum laboriosam soluta recusandae molestiae dolore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos et, porro ab? Porro, dicta impedit labore eius iste eligendi. Ab perspiciatis minima, provident nemo eos eveniet necessitatibus id accusantium ipsam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus nostrum numquam alias quas recusandae aliquid maiores, enim repellat magnam ad labore vel cumque voluptate aliquam ipsa voluptas sequi nulla, beatae.
				</h1>
				<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas perferendis, voluptatem quo maxime natus aut, culpa veniam quibusdam iusto suscipit quos velit excepturi nulla doloremque dolorem unde. Porro, nobis, maxime!</h1>
				<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias sapiente aut maxime voluptatem accusamus, quidem debitis, impedit tempora fugit recusandae nam eligendi tenetur eius delectus sit, deserunt quae. Blanditiis, culpa.</h1>
			</div>
			
		</div>
		
	</div>

		<script>
			function typeWriter(text, n) {
				if (n < (text.length)) {
					$('.howcanhelp').html(text.substring(0, n+1));
					n++;
					setTimeout(function() {
						typeWriter(text, n)
					}, 30);
				}
			}

			$('.start').click(function(e) {


			});

		</script>

		<script>
			$(document).ready(function(){

				$("#f").click(function(){
					$(".footer-home").toggleClass('opened');
					$(".content-mobile").fadeToggle();
				});

				var nome = $("#nome");
				var email = $("#email");
				var mensagem = $("#mensagem");


				$("#nomeuser").text("...")
				$("#msguser").text("...")

				nome.on("input", function(e) {

					$(".labelemail").fadeIn();
					$(".email").fadeIn();
					$("#nomeuser").text( "Ok, " + $(e.target).val() + "..")
					if (nome.val()=="") {
						$("#nomeuser").text("...")

					};
				});

				email.on("input", function(e) {

					$("#msguser").text("");
					if (email.val().length==1) {
						var text = $('.howcanhelp').data('text'); 
						typeWriter(text, 1);
						$(".howcanhelp").fadeIn();

					}
					if (email.val()=="") {
						$('#msguser').delay(400).queue(function(n) { 
							$(this).text('...'); n();
						});

						
						var text = $('.howcanhelp').data('text');
						$(".howcanhelp").fadeOut();
					};
				});

				mensagem.on("input", function(e) {
					$('.submit-btn').addClass("view");
					
					if (mensagem.val()=="") {
						$('.submit-btn').removeClass("view");
					};
				});

			});
		</script>

		<?php 
		include 'partes/footer.php';
		?>

		<?php
		include 'partes/endFooter.php';
		?> 