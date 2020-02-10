<template>
    <nav
        class="navbar-balance"
        v-on="isMobile ? {} : { mouseleave: closeSubmenu }"
    >
        <!-- Page Title -->
        <div class="flex items-center flex-shrink-0 text-white mr-1">
					<a :href="pageHome" class="navbar-link" >
						<slot>
						<!--<img src="/css/icons/nibble_francesinhas.jpg">-->
							<span class="font-semibold text-xl tracking-normal">
										{{pageName}}
							</span>
						</slot>
					</a>
        </div>
        <!-- Mobile Show Menu Button -->
        <div class="block md:hidden">
            <button
                @click="visible = !visible"
                class="navbar-open-icon"
            >
                <svg
                    class="fill-current h-3 w-3"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div
            class="w-full block flex-grow md:flex md:items-center md:w-auto"
            :class="visible ? '' : 'hidden'"
        >
            <!-- Middle Nav Menu -->
            <div class="text-sm md:flex-grow">
                <div
                    v-if="
                        (isSignedIn && menu.login) ||
                            (!isSignedIn && !menu.login) ||
                            !menu.lockLogin
                    "
                    v-for="menu in localMenuList"
                    :key="menu.title"
                    class="navbar-menu-group"
                >
                    <a
                        v-if="menu.link"
                        v-on="
                            isMobile
                                ? { click: () => toggleSubmenu(menu.title) }
                                : { mouseover: () => openSubmenu(menu.title) }
                        "
                        :href="menu.link ? menu.link : '#'"
                        class="navbar-link navbar-link-margins"
                    >
                        {{ menu.title }}
                    </a>
                    <span
                        v-else
                        v-on="
                            isMobile
                                ? { click: () => toggleSubmenu(menu.title) }
                                : { mouseover: () => openSubmenu(menu.title) }
                        "
                        class="navbar-link navbar-link-margins"
                    >
                        {{ menu.title }}
                    </span>
                    <transition name="dropdown-transition" mode="out-in">
                        <ul
                            v-if="
                                menu.menus &&
                                    menu.menus.length &&
                                    menu.showSubmenu
                            "
                            class="navbar-dropdown-group z-index-top"
                            v-on="
                                isMobile
                                    ? {}
                                    : {
                                          mouseleave: () =>
                                              closeSubmenu(menu.title)
                                      }
                            "
                        >
                            <li
                                v-for="submenu in menu.menus"
                                :key="submenu.title"
                                class="navbar-dropdown-item"
                            >
                                <a
                                    class="block"
                                    :href="submenu.link ? submenu.link : '#'"
                                >
                                    <svg
                                        class="svg-list-icon"
                                        version="1.1"
                                        viewBox="0 0 9.9999 7.9999"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <g
                                            transform="translate(-3.504e-5 -289)"
                                        >
                                            <g
                                                transform="translate(-25.136 251.01)"
                                            >
                                                <path
                                                    d="m25.415 38.27 9.441 3.7205-9.441 3.7205c1.5083-2.1966 1.4996-5.2019 1e-6 -7.441z"
                                                    fill-rule="evenodd"
                                                    stroke="#000"
                                                    stroke-linejoin="round"
                                                    stroke-width=".559"
                                                />
                                            </g>
                                        </g>
                                    </svg>
                                    {{ submenu.title }}
                                </a>
                            </li>
                        </ul>
                    </transition>
                </div>
            </div>
            <!-- Right Menu -->
            <div class="text-sm justify-end">
                <div
                    v-if="
                        (isSignedIn && menu.login) ||
                            (!isSignedIn && !menu.login) ||
                            !menu.lockLogin
                    "
                    v-for="menu in localMenuRightList"
                    :key="menu.title"
                    class="navbar-menu-group z-index-top"
                >
                    <a
                        v-if="menu.link"
                        v-on="
                            isMobile
                                ? { click: () => toggleSubmenu(menu.title) }
                                : { mouseover: () => toggleSubmenu(menu.title) }
                        "
                        :href="menu.link ? menu.link : '#'"
                        class="navbar-link navbar-link-margins"
                    >
                        {{ menu.title }}
                    </a>
                    <span
                        v-else
                        v-on="
                            isMobile
                                ? { click: () => toggleSubmenu(menu.title) }
                                : { mouseover: () => toggleSubmenu(menu.title) }
                        "
                        class="navbar-link navbar-link-margins"
                    >
                        {{ menu.title }}
                    </span>
                    <transition name="dropdown-transition">
                        <ul
                            v-if="
                                menu.menus &&
                                    menu.menus.length &&
                                    menu.showSubmenu
                            "
                            class="navbar-dropdown-group right-0"
                            v-on="
                                isMobile
                                    ? {}
                                    : {
                                          mouseleave: () =>
                                              closeSubmenu(menu.title)
                                      }
                            "
                        >
                            <li
                                v-for="submenu in menu.menus"
                                :key="submenu.title"
                                class="navbar-dropdown-item"
                            >
                                <a
                                    class="block"
                                    :href="submenu.link ? submenu.link : '#'"
                                >
                                    <svg
                                        class="svg-list-icon"
                                        version="1.1"
                                        viewBox="0 0 9.9999 7.9999"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <g
                                            transform="translate(-3.504e-5 -289)"
                                        >
                                            <g
                                                transform="translate(-25.136 251.01)"
                                            >
                                                <path
                                                    d="m25.415 38.27 9.441 3.7205-9.441 3.7205c1.5083-2.1966 1.4996-5.2019 1e-6 -7.441z"
                                                    fill-rule="evenodd"
                                                    stroke="#000"
                                                    stroke-linejoin="round"
                                                    stroke-width=".559"
                                                />
                                            </g>
                                        </g>
                                    </svg>
                                    {{ submenu.title }}
                                </a>
                            </li>
                        </ul>
                    </transition>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import breakpoints from "./plugins/screenBreakpoints.js";

export default {
    props: {
        showUser: {
            type: Boolean,
            default: false
        },
        menuTitle: {
            type: Object,
            required: false
        },
        menuList: {
            type: Array,
            default() {
                return [
                    {
                        title: "Menu 1",
                        link: "",
                        login: true,
                        lockLogin: true,
                        menus: [
                            { title: "Submenu 1", link: "/submenus/Submenu1" },
                            { title: "Submenu 2", link: "/submenus/Submenu2" }
                        ]
                    },
                    {
                        title: "Menu 2",
                        link: "",
                        login: false,
                        lockLogin: false,
                        menus: [
                            { title: "Submenu 1", link: "/submenus/Submenu1" }
                        ]
                    }
                ];
            }
        },
        menuRightList: {
            type: Array,
            default() {
                return [
                    {
                        title: "User",
                        link: "",
                        login: true,
                        lockLogin: true,
                        menus: [
                            { title: "Register", link: "/register" },
                            { title: "Logout", link: "/logout" }
                        ]
                    },
                    {
                        title: "Login",
                        link: "/login",
                        login: false,
                        lockLogin: true,
                        menus: []
                    }
                ];
            }
        }
    },
    data: function() {
        return {
            localMenuList: [],
            localMenuRightList: [],
            breakpoints,
            visible: false
        };
    },
    computed: {
        isSignedIn() {
            return !!window.App.signedIn;
        },
        currentUserName() {
            return window.App.user.name;
        },
        pageName() {
            return this.menuTitle.hasOwnProperty("name")
                ? this.menuTitle.name
                : "No Name";
        },
        pageHome() {
            return this.menuTitle.hasOwnProperty("link")
                ? this.menuTitle.link
                : "/";
        },
        isMobile() {
            //return this.visible;
            return breakpoints.w < breakpoints.screens.md;
        }
    },
    methods: {
        toggleSubmenu(menuKey) {
            this.localMenuList.forEach((menu, index) => {
                if (this.isMobile) {
                    if (menu.title === menuKey) {
                        this.localMenuList[index].showSubmenu = menu.showSubmenu
                            ? false
                            : true;
                    }
                } else {
                    this.localMenuList[index].showSubmenu =
                        menu.title === menuKey
                            ? menu.showSubmenu
                                ? false
                                : true
                            : false;
                }
            });
            this.localMenuRightList.forEach((menu, index) => {
                if (this.isMobile) {
                    if (menu.title === menuKey) {
                        this.localMenuRightList[
                            index
                        ].showSubmenu = menu.showSubmenu ? false : true;
                    }
                } else {
                    this.localMenuRightList[index].showSubmenu =
                        menu.title === menuKey
                            ? menu.showSubmenu
                                ? false
                                : true
                            : false;
                }
            });
        },
        openSubmenu(menuKey) {
            this.localMenuList.forEach((menu, index) => {
                if (this.isMobile) {
                    if (menu.title === menuKey) {
                        this.localMenuList[index].showSubmenu = true;
                    }
                } else {
                    this.localMenuList[index].showSubmenu =
                        menu.title === menuKey ? true : false;
                }
            });
            this.localMenuRightList.forEach((menu, index) => {
                if (this.isMobile) {
                    if (menu.title === menuKey) {
                        this.localMenuRightList[index].showSubmenu = true;
                    }
                } else {
                    this.localMenuRightList[index].showSubmenu =
                        menu.title === menuKey ? true : false;
                }
            });
        },
        closeSubmenu(menuKey) {
            this.localMenuList.forEach((menu, index) => {
                this.localMenuList[index].showSubmenu = false;
            });
            this.localMenuRightList.forEach((menu, index) => {
                this.localMenuRightList[index].showSubmenu = false;
            });
        }
    },
    mounted() {
        //this.localMenuList = this.menuList;
        this.menuList.forEach(menu => {
            this.localMenuList.push({ ...menu, showSubmenu: false });
        });
        this.menuRightList.forEach(menu => {
            this.localMenuRightList.push({ ...menu, showSubmenu: false });
        });
    }
};
</script>

<style lang="scss">
@import "../../sass/navbarDroppable.scss";

.z-index-top {
    z-index: 100;
}

.dropdown-transition-enter-active {
    transition: opacity 0.5s;
}
.dropdown-transition-leave-active {
    transition: opacity 0.2s;
}
.dropdown-transition-enter, .dropdown-transition-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
