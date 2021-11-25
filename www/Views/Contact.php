<div class="main">
    <div class="mainblock" style="">
    <div class="container-element block container-element--full unconstrained p-5">

            <h1 class="text-light">Nous contacter</h1>
            <form action="/contact" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label text-light">Nom complet</label>
                    <input type="text" class="input-field" maxlength="32" id="name" name="name" value="" placeholder="Nom Prénom">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-light">Email</label>
                    <input type="email" class="input-field" maxlength="380" id="email" name="email" value="" placeholder="Votre@email.com">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label text-light">Message</label>
                    <textarea type="text" class="input-field" id="message" name="message" placeholder="Message"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" name="contact" class="btn btn-link link-color-green">Envoyer</button>
                </div>

            </form>
        </div>
    </div>
</div>
