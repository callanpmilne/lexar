<footer>
  <section>
    <p>Copyright &copy; <?php echo date("Y"); ?></p>
    <p id="poweredby">
      [ Powered by <a href="https://github.com/callanpmilne/lexar" target="_blank">Lexar</a> ]
    </p>
  </section>
</footer>

<style>
  footer {
    background: radial-gradient(#005955, #004360);
    background-size: 200% 200%;
    border-top: 1px solid #088ea9;
    color: rgba(255, 255, 255, 0.8);
    height: 4rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 1rem 1rem 5rem;
    font-size: 0.88rem;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    background-position: -25% -25%;
  }

  footer a {
    color: #fff;
  }

  footer section {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  footer section p {
    margin: 0;
  }

  footer section p:first-of-type {
    margin-top: 0;
  }

  footer section p:last-of-type {
    margin-bottom: 0;
  }

  #poweredby {
    margin-top: 0.5rem;
    font-size: 0.7rem;
  }

  #poweredby a {
    font-weight: 500;
  }
</style>