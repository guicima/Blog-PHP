<div class="main">
    <div class="mainblock" style="">
        <div class="container-element block container-element--full">
            <div class="d-flex flex-column flex-md-row justify-content-evenly align-items-center h-100">
                <div class="" style="background: #8e9dcc; border-radius: 100%; width: 250px; height: 250px; display: grid; place-items: center; overflow: hidden;">
                    <img class="w-100" src="/assets/images/logo_light.svg" alt="Profil">
                </div>
                <div class="w-50 text-color-light">
                    <h1 class="">Guilherme Cima Batista</h1>
                    <h4 class="mb-5">L'innovation accessible à tous.</h4>
                    <a target="_blank" class="ps-0 p-2 ms-0 mx-3 link-color-light" href="https://twitter.com/Guilherme_Cima" alt="Twitter"><i class="fab fa-twitter"></i></a>
                    <a target="_blank" class="p-2 mx-3 link-color-light" href="https://www.linkedin.com/in/guicima/" alt="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a target="_blank" class="p-2 mx-3 link-color-light" href="https://github.com/guicima" alt="GitHub"><i class="fab fa-github"></i></a>
                    <a target="_blank" class="p-2 mx-3 link-color-light" href="https://github.com/guicima/Blog-PHP" alt="Code source"><i class="fas fa-code-branch"></i></a>
                    <a class="p-2 mx-3 link-color-light" target="_blank" href="/assets/CV.pdf"><i class="fas fa-download"></i> Télécharger le CV</a>
                </div>
                
            </div>
        </div>

        <div class="container-element block container-element--full unconstrained p-5">

            <h1 class="text-light">Contacter</h1>
            <form action="/contact" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label text-light">Nom complet</label>
                    <input type="text" class="input-field" maxlength="32" id="name" name="name" value="" placeholder="Nom Prénom" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-light">Email</label>
                    <input type="email" class="input-field" maxlength="380" id="email" name="email" value="" placeholder="Votre@email.com" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label text-light">Message</label>
                    <textarea type="text" class="input-field" id="message" name="message" placeholder="Message" required></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" name="contact" class="btn btn-link link-color-green">Envoyer</button>
                </div>

            </form>
        </div>
    </div>
</div>
