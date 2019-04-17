  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
      <header class="navbar" style="background: white;">
          <div class="container">
              <div class="navbar-brand">
                  <a class="navbar-item" href="/marina" style="background-color: white; flex-shrink: initial;">
                      <img style="width: 10%; height: auto; min-width:90px"
                          src="https://lh3.googleusercontent.com/fiHblddydIDlTK2XzRj7Fu_Fqm5rwtnkZx8lJkPNNzgvaJQK7SyYXHrynfnTbpdm80O4KSKNd-X5kOVEUNzWf7pCtBTBuec8owwtEFAbvQbZ3CPSBVM47uXzq8AkssZCbFIlaDdfTgQL3VDuW-4rX5Gz7vRVFkk7sZD_oQCbm_rXRJeDkhiKKsUEgnxo0d0C-Ed7KnYMgJwRUK8Ec7nI2P5RD09fktbkHRCsnSQwfEj2bSDtsFFMit2VE-WUU10__vJwMF6Zc7rEkYkXI7S6nxvElMgIZNf7zSU9aJZQPByPrOLm1NituxWHJ0_cT6FAwJto5Tnzp0I_nc8JlAQwD1XMgIkLeLGwaR7Tp1ELXxTtZb2T8o1l_fBuDp7Qg2ADMESrbdMGb2fyNRD250cI2hEkkrhI17zADkygsIumopRHGWJbW_m3HyxKiFBGlY-KH6wBywmI0_rMhSpM_wmy2ukRjv71vPEWoxAkce8k3cQfEtZxUQtvlfZHZWnYiGYfM5FOG7Y0fGYgTWAJ5OGQczTdP-f6D3-sipfYGupxJzr6esg_wDCpzgtCQMp81PHs50hUMFk9I_ddVlFbhIMGYo8xss07WiiJbqEnRlg=w1600-h758"
                          alt="Marina Wave">
                  </a>
                  <a class="qr-icon" href="/qrcode" style="margin: 10px;width: 35px;height: 35px;">
                      <img style="width: 35px; height: 35px; max-width: unset;"
                          src="https://lh3.googleusercontent.com/1Le4AHprrR0jhx8k9i2WzjDIjvaLgz2dx0lK76OdqaVQecQJ70ntSrasC80wqrITNjYBRQe-S6Ry8uYl-5v6mD6KUbL9R190XXNzjWpHpAy-wBl0P8XTanesCj1kTXQRh3BUWJ4k9FSVIHH_UacW6dvaptc15TTZG2SdCkhOox9Gvlh-BL3U562F8up-YpgNRxuY_41F2EzpJIZccV11qNJytFzn2f7uxh7t4OE6oo69wVgOE-aCn2MV7lYO59ej44JycZFf99DVq_ARlugQNAjwFGs11gnj1AbM8V8dHOjW8zPtQtRIomFBY11D6Xb9SLGixjKwCvjux0bquuzgSJDuLgT5w3yHOJcLpwTtuoIgISNnDnA29zJo6Ew4gW9hVEQKA9qnVem6-Gv8wyokLOOrT02PBsZ9PpMGtDLqxySsr7pjngDknE6x6jHujYGvXaZIVQOTVqOCFjLyaIqUyjjzPOJaTqUyX3MLAnahPP1_LYhSFvL7rAo0yiKaZ0XPQznV1mXUzAkIG1W8_m2ieESkqUpnno0L6dtA_MOnA1wj-fGqdTlMh2CSpjPcTe5uHGyPafQP9mR7fGM9ORuAEtQr9y_BWXYA7wMEGCQ=w1600-h758"
                          alt="Marina Wave">
                  </a>
                  <span class="navbar-burger burger" data-target="navbarMenuHeroC" style="display:none;">
                      <span></span>
                      <span></span>
                      <span></span>
                  </span>
              </div>
              <div id="navbarMenuHeroC" class="navbar-menu">
                  <div class="navbar-end" style="display:none;">
                      <a class="navbar-item is-active" href="/marina">
                          Home
                      </a>
                      <a class="navbar-item">
                          Perfil
                      </a>
                      <a class="navbar-item">
                          Relatórios
                      </a>
                      <span class="navbar-item">
                          <a class="button is-info is-inverted">
                              <span class="icon has-text-info">
                                  <i class="fa fa-mobile-alt"></i>
                              </span>
                              <span>Instalar</span>
                          </a>
                      </span>
                  </div>
              </div>
          </div>
      </header>
  </div>
  <div style="
    width: 100%;background-color: white;">
      <div>
          <a class="navbar-item" href="/marina" style="float: left;color:grey;">Home</a>
          <a class="navbar-item" style="float: left;color:grey;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
      </div>
  </div>