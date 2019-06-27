<template>
  <f7-page name="home">
    <!-- Top Navbar -->
    <f7-navbar :sliding="false" large >
      <!--
      <f7-nav-left>
        <f7-link icon-ios="f7:menu" icon-aurora="f7:menu" icon-md="material:menu" panel-open="left"></f7-link>
      </f7-nav-left>
      -->
      <f7-nav-title sliding>Observatorio de la Laguna</f7-nav-title>
      <!--
      <f7-nav-right>
        <f7-link icon-ios="f7:menu" icon-aurora="f7:menu" icon-md="material:menu" panel-open="right"></f7-link>
      </f7-nav-right>
      -->
      <!--<f7-nav-title-large sliding bg-color="teal" text-color="white"><small>Observatorio de la Laguna</small></f7-nav-title-large>-->
    </f7-navbar>
    <!-- Toolbar-->
    <!--<f7-toolbar bottom>
      <f7-link>Left Link</f7-link>
      <f7-link>Right Link</f7-link>
    </f7-toolbar>
    -->
    <!-- Page content-->
    <f7-block-title>Noticias</f7-block-title>
    <!--<f7-block strong>      -->
    <f7-block>      
      <f7-card title="La modernización del transporte en la ZML" class="demo-card-header-pic">        
        <f7-card-content >
          <p class="date">por David Ruelas Sarmiento | Jun 20, 2019 </p>       
          <p>Previo al inicio de su mandato, el entonces presidente nacional EPN estableció 266 compromisos de gobierno, de los cuales 90 estaban ligados a impulsar la movilidad urbana sustentable en ciudades mayores a 500 mil habitantes. Tema estratégico y prioritario En ese...</p>
        </f7-card-content>
        <f7-card-footer>
          <f7-link href="/news/">Ver</f7-link>
          <f7-link>Compartir</f7-link>
        </f7-card-footer>
      </f7-card>
            
      <f7-card title="Más allá del Reto Anticorrupción" class="demo-card-header-pic">        
        <f7-card-content>
          <p class="date">por Marco Antonio Zamarripa González | Jun 13, 2019 </p>       
          <p>El reto de los 100 días que se está implementando en el Sistema Estatal Anticorrupción de Coahuila (SEAC) a iniciativa del Consejo de Participación Ciudadana y bajo la metodología del Instituto de Resultados Rápidos (IRR) pronto llegará a su conclusión. Tiempos de...</p>
        </f7-card-content>
        <f7-card-footer>
          <f7-link></f7-link>
          <f7-link>Compartir</f7-link>
        </f7-card-footer>
      </f7-card>

    </f7-block>

    <!--<f7-block-title>Navigation</f7-block-title>
    <f7-list>
      <f7-list-item link="/about/" title="About"></f7-list-item>
      <f7-list-item link="/form/" title="Form"></f7-list-item>
    </f7-list>

    <f7-block-title>Modals</f7-block-title>
    <f7-block strong>
      <f7-row>
        <f7-col width="50">
          <f7-button fill raised popup-open="#my-popup">Popup</f7-button>
        </f7-col>
        <f7-col width="50">
          <f7-button fill raised login-screen-open="#my-login-screen">Login Screen</f7-button>
        </f7-col>
      </f7-row>
    </f7-block>

    <f7-block-title>Panels</f7-block-title>
    <f7-block strong>
      <f7-row>
        <f7-col width="50">
          <f7-button fill raised panel-open="left">Left Panel</f7-button>
        </f7-col>
        <f7-col width="50">
          <f7-button fill raised panel-open="right">Right Panel</f7-button>
        </f7-col>
      </f7-row>
    </f7-block>

    <f7-list>
      <f7-list-item
        title="Dynamic (Component) Route"
        link="/dynamic-route/blog/45/post/125/?foo=bar#about"
      ></f7-list-item>
      <f7-list-item
        title="Default Route (404)"
        link="/load-something-that-doesnt-exist/"
      ></f7-list-item>
      <f7-list-item
        title="Request Data & Load"
        link="/request-and-load/user/123456/"
      ></f7-list-item>
    </f7-list>
    -->
  </f7-page>
</template>