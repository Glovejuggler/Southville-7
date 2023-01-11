<template>
  <div v-if="width > 768" class="sidebar dark:bg-zinc-900 bg-theme-800" :class="isOpened ? 'open' : ''"
    :style="cssVars">
    <div class="logo-details" style="margin: 6px 14px 0 14px;">
      <img v-if="menuLogo" :src="menuLogo" alt="menu-logo" class="menu-logo icon">
      <i v-else class="bx icon" :class="menuIcon" />
      <div class="logo_name">
        Southville 7
      </div>
      <i class="bx" :class="isOpened ? 'bx-menu-alt-right' : 'bx-menu'" id="btn" @click="isOpened = !isOpened" />
    </div>

    <div
      style="display: flex ; flex-direction:column; justify-content: space-between; flex-grow: 1; max-height: calc(100% - 60px); ">
      <div id="my-scroll" style="margin: 6px 14px 0 14px;">
        <ul class="nav-list" style="overflow: visible;">

          <span class="relative group" v-for="(menuItem, index) in menuItems" :key="index">
            <li v-if="menuItem.role.some(r => $page.props.auth.position.includes(r)) || menuItem.role.length < 1">
              <Link :href="menuItem.link" :class="{ 'active': $page.component.startsWith(menuItem.parent) }"
                class="dark:bg-zinc-900">
              <i class="bx" :class="menuItem.icon || 'bx-square-rounded'" />
              <span class="links_name">{{ menuItem.name }}</span>
              </Link>
              <span class="tooltip">{{
                menuItem.tooltip
              }}</span>
            </li>
          </span>
        </ul>
      </div>
      <div v-if="isLoggedIn" class="profile dark:bg-zinc-900">
        <div class="profile-details dark:bg-zinc-900 bg-theme-800">
          <img v-if="profileImg" src="/images/photo.jpg" alt="profileImg" class="hidden">
          <i v-else class="bx bxs-user-rectangle" />
          <div class="name_job">
            <div class="name">
              {{ $page.props.auth.user.name }}
            </div>
            <div class="job">
              {{
                $page.props.auth.user.id === 1 ?
                  'Admin' : $page.props.auth.position.length ?
                    $page.props.auth.position[0] : 'Member'
              }}
            </div>
          </div>
        </div>
        <Link as="button" :href="route('logout')" method="post">
        <i v-if="isExitButton" class="dark:bg-zinc-900 bg-theme-800 bx bx-log-out" id="log_out" />
        </Link>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'SidebarMenuAkahon',
  components: {
    Link,
  },
  props: {
    //! Menu settings
    isMenuOpen: {
      type: Boolean,
      default: true,
    },
    menuTitle: {
      type: String,
      default: 'Southville 7',
    },
    menuLogo: {
      type: String,
      default: '',
    },
    menuIcon: {
      type: String,
      default: 'bx-analyse',
    },
    isPaddingLeft: {
      type: Boolean,
      default: true,
    },
    menuOpenedPaddingLeftBody: {
      type: String,
      default: '250px'
    },
    menuClosedPaddingLeftBody: {
      type: String,
      default: '78px'
    },

    //! Menu items
    menuItems: {
      type: Array,
      default: () => [
        {
          link: route('dashboard'),
          name: 'Dashboard',
          tooltip: 'Dashboard',
          icon: 'bx-grid-alt',
          parent: 'Dashboard',
          role: []
        },
        {
          link: route('members.index'),
          name: 'Members',
          tooltip: 'Members',
          icon: 'bx-user',
          parent: 'Members',
          role: [
            'Secretary',
            'Chairman',
            'Vice Chairman',
            'Treasurer'
          ]
        },
        {
          link: route('loanables.index'),
          name: 'Loan Services',
          tooltip: 'Loan Services',
          icon: 'bx-donate-heart',
          parent: 'Loan Services',
          role: [
            'Chairman',
            'Vice Chairman',
            'Treasurer'
          ]
        },
        {
          link: route('events.index'),
          name: 'Events',
          tooltip: 'Events',
          icon: 'bx-calendar-event',
          parent: 'Events',
          role: [
            'Secretary'
          ],
        },
        {
          link: route('post.index'),
          name: 'Posts',
          tooltip: 'Posts',
          icon: 'bx-news',
          parent: 'Posts',
          role: [
            'Secretary'
          ],
        },
        {
          link: route('roles.index'),
          name: 'Roles',
          tooltip: 'Roles',
          icon: 'bx-briefcase',
          parent: 'Roles',
          role: [
            'Chairman',
            'Vice Chairman'
          ]
        },
        {
          link: route('user.settings'),
          name: 'Settings',
          tooltip: 'Settings',
          icon: 'bx-cog',
          parent: 'User',
          role: []
        },
      ],
    },

    //! Profile detailes
    profileImg: {
      type: String,
      default: '/assets/img/photo.jpg',
    },
    profileName: {
      type: String,
      default: 'Admin',
    },
    profileRole: {
      type: String,
      default: '',
    },
    isExitButton: {
      type: Boolean,
      default: true,
    },
    isLoggedIn: {
      type: Boolean,
      default: true,
    },

    //! Styles
    bgColor: {
      type: String,
      default: '#012129',
    },
    secondaryColor: {
      type: String,
      default: '#4A2C2A',
    },
    homeSectionColor: {
      type: String,
      default: '#e4e9f7',
    },
    logoTitleColor: {
      type: String,
      default: '#fff',
    },
    iconsColor: {
      type: String,
      default: '#fff',
    },
    itemsTooltipColor: {
      type: String,
      default: '#e4e9f7',
    },
    searchInputTextColor: {
      type: String,
      default: '#fff',
    },
    menuItemsHoverColor: {
      type: String,
      default: '#fff',
    },
    menuItemsTextColor: {
      type: String,
      default: '#fff',
    },
    menuFooterTextColor: {
      type: String,
      default: '#fff',
    },
  },
  data() {
    return {
      width: window.innerWidth ?? screen.width,
      isOpened: false,
    }
  },
  mounted() {
    var width = window.innerWidth ?? screen.width;
    this.isOpened = width > 768 ? this.isMenuOpen : this.isOpened;
    if (this.width > 768) {
      document.getElementById('main').style.paddingLeft = this.isOpened ? this.menuOpenedPaddingLeftBody : this.menuClosedPaddingLeftBody;
    } else {
      document.getElementById('main').style.paddingLeft = '0px';
    }
    window.addEventListener("resize", this.beResponsive);
  },
  computed: {
    cssVars() {
      return {
        // '--padding-left-body': this.isOpened ? this.menuOpenedPaddingLeftBody : this.menuClosedPaddingLeftBody,
        '--bg-color': this.bgColor,
        '--secondary-color': this.secondaryColor,
        '--home-section-color': this.homeSectionColor,
        '--logo-title-color': this.logoTitleColor,
        '--icons-color': this.iconsColor,
        '--items-tooltip-color': this.itemsTooltipColor,
        '--serach-input-text-color': this.searchInputTextColor,
        '--menu-items-hover-color': this.menuItemsHoverColor,
        '--menu-items-text-color': this.menuItemsTextColor,
        '--menu-footer-text-color': this.menuFooterTextColor,
      }
    },
  },
  watch: {
    isOpened() {
      document.getElementById('main').style.paddingLeft = this.isOpened && this.isPaddingLeft ? this.menuOpenedPaddingLeftBody : this.menuClosedPaddingLeftBody
    },
  },
  methods: {
    beResponsive() {
      this.width = window.innerWidth ?? screen.width;
      if (this.width > 900) {
        this.isOpened = true;
      } else if (this.width > 768) {
        this.isOpened = false;
      } else {
        document.getElementById('main').style.paddingLeft = '0px';
      }
    }
  }
}
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

main {
  transition: all 0.5s ease;
}

.menu-logo {
  width: 30px;
  margin: 0 10px 0 10px;
}

.sidebar {
  position: relative;
  display: flex;
  flex-direction: column;
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  min-height: min-content;
  /* overflow-y: auto; */
  width: 78px;
  /* padding: 6px 14px 0 14px; */
  z-index: 30;
  transition: all 0.5s ease;
}

.sidebar.open {
  width: 250px;
}

.sidebar .logo-details {
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}

.sidebar .logo-details .icon {
  opacity: 0;
  transition: all 0.5s ease;
}

.sidebar .logo-details .logo_name {
  color: var(--logo-title-color);
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}

.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name {
  opacity: 1;
}

.sidebar .logo-details #btn {
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}

.sidebar.open .logo-details #btn {
  text-align: right;
}

.sidebar i {
  color: var(--icons-color);
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}

.sidebar .nav-list {
  margin-top: 20px;
  /* margin-bottom: 60px; */
  /* height: 100%; */
  /* min-height: min-content; */
}

.sidebar li {
  position: relative;
  margin: 8px 0;
  list-style: none;
}

.sidebar li .tooltip {
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: var(--items-tooltip-color);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}

.sidebar li:hover .tooltip {
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}

.sidebar.open li .tooltip {
  display: none;
}

.sidebar input {
  font-size: 15px;
  color: var(--serach-input-text-color);
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: var(--secondary-color);
}

.sidebar li a {
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}

.sidebar li a.active {
  background: rgba(255, 255, 255, 0.2);
}

.sidebar li a:hover {
  background: var(--menu-items-hover-color);
}

.sidebar li a .links_name {
  color: var(--menu-items-text-color);
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}

.sidebar.open li a .links_name {
  opacity: 1;
  pointer-events: auto;
}

.sidebar li a:hover .links_name,
.sidebar li a:hover i {
  transition: all 0.5s ease;
  color: var(--bg-color);
}

.sidebar li i {
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}

.sidebar div.profile {
  position: relative;
  height: 60px;
  width: 78px;
  /* left: 0;
    bottom: 0; */
  padding: 10px 14px;
  /* background: var(--secondary-color); */
  transition: all 0.5s ease;
  overflow: hidden;
}

.sidebar.open div.profile {
  width: 250px;
}

.sidebar div .profile-details {
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
  transition: all 0.5s ease;
}

.sidebar div img {
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}

.sidebar div.profile .name,
.sidebar div.profile .job {
  font-size: 15px;
  font-weight: 400;
  color: var(--menu-footer-text-color);
  white-space: nowrap;
}

.sidebar div.profile .job {
  font-size: 12px;
}

.sidebar .profile #log_out {
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  /* background: var(--secondary-color); */
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}

.sidebar.open .profile #log_out {
  width: 50px;
  /* background: var(--secondary-color); */
}

.sidebar.open .profile:hover #log_out {
  opacity: 1;
}

.sidebar.open .profile #log_out:hover {
  opacity: 1;
  color: #ed7464;
}

.sidebar .profile #log_out:hover {
  color: #ed7464;
}

.home-section {
  position: relative;
  background: var(--home-section-color);
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}

.sidebar.open~.home-section {
  left: 250px;
  width: calc(100% - 250px);
}

.home-section .text {
  display: inline-block;
  color: var(--bg-color);
  font-size: 25px;
  font-weight: 500;
  margin: 18px;
}

.my-scroll-active {
  overflow-y: auto;
}

#my-scroll {
  overflow-y: auto;
  height: calc(100% - 60px);
}

#my-scroll::-webkit-scrollbar {
  display: none;
  /* background-color: rgba(255, 255, 255, 0.2); 
    width: 10px;
    border-radius:5px  */
}

/* #my-scroll::-webkit-scrollbar-thumb{
    background-color: red;
    border-radius:5px 
  }
  #my-scroll::-webkit-scrollbar-button:vertical:start:decrement{
    display:none;
  }
  #my-scroll::-webkit-scrollbar-button:vertical:end:increment{
    display:none;
  } */
@media (max-width: 420px) {
  .sidebar li .tooltip {
    display: none;
  }
}
</style>
