<aside
  id="Sidebar">
  
  <section class="sidebar-entry">
    Sidebar Item
  </section>

  <section class="sidebar-grid">
    <ol>
      <li><div class="grid-item"></div></li>
      <li><div class="grid-item"></div></li>
      <li><div class="grid-item"></div></li>
      <li><div class="grid-item"></div></li>
      <li><div class="grid-item"></div></li>
      <li><div class="grid-item"></div></li>
    </ol>
  </section>
  
  <section class="sidebar-entry">
    Sidebar Item
  </section>
  
  <section class="sidebar-entry">
    Sidebar Item
  </section>

</aside>

<style>
  #Sidebar {
    width: 100%;
    box-sizing: border-box;
  }

  #Sidebar section.sidebar-entry {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 1rem 1rem;
    padding: 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.25rem;
    transition: all 333ms;
    aspect-ratio: 16 / 6;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    text-decoration: none;
    display: flex;
    flex: 1;
    flex-direction: column;
    backdrop-filter: brightness(0.75) blur(10px);
    overflow: hidden;
  }

  #Sidebar section.sidebar-grid {
    margin: 0 0 1rem;
  }

  #Sidebar section.sidebar-grid ol {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: flex-start;
    padding: 0 0.5rem;
    margin: 0;
  }

  #Sidebar section.sidebar-grid ol li {
    display: flex;
    width: 50%;
    box-sizing: border-box;
  }

  #Sidebar section.sidebar-grid ol li div.grid-item {
    margin: 0.5rem;
    backdrop-filter: brightness(0.75) blur(10px);
    width: 100%;
    aspect-ratio: 16 / 9;
    display: flex;
    flex: 1;
    border-radius: 0.25rem;
    overflow: hidden;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    background: linear-gradient(163deg, rgb(0 0 0 / 24%) 0%, rgb(0 0 0 / 34%) 100%);
  }

  @media screen and (min-width: 800px) {
    #Sidebar {
      width: 25vw;
      max-width: 25vw;
      flex: 1;
      padding-top: 0.5rem;
    }

    #Sidebar section.sidebar-entry {
      margin-bottom: 1.5rem;
    }
  }
</style>