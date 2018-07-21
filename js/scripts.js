(function ($, Drupal, window, document) {

  'use strict';

  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.my_custom_behavior = {
    attach: function (context, settings) {

      // Mobile Search
      $('#main-menu').prepend('<a class="menu-toggle">Menu</a>');

      $('.menu-toggle').click(function () {
        var menu_ul = $('#main-menu > .menu');
        var button_ul = $('.menu-toggle');

        if (menu_ul.hasClass('open')) {
          menu_ul.removeClass('open');
        }
        else {
          menu_ul.addClass('open');
        }

        if (button_ul.hasClass('close')) {
          button_ul.removeClass('close');
        }
        else {
          button_ul.addClass('close');
        }
      });

      // Add toggle class to trigger open and closed menu
      $('#main-menu .expanded').prepend('<a class="sub-menu-toggle"></a>');

      // Click in the toggle area to trigger open and closed menu
      $('#main-menu ul li').click(function () {

        // If this toggle is open, close toggle and menu.
        if ($(this).children('.sub-menu-toggle').hasClass('close')) {
          $('.sub-menu-toggle').removeClass('close');
          $('#main-menu .expanded .menu').removeClass('open');
        }
        // If we're clicking on another one, close all and open just this one
        else {
          $('.sub-menu-toggle').removeClass('close');
          $('#main-menu .expanded .menu').removeClass('open');
          $(this).children('.sub-menu-toggle').addClass('close');
          $(this).children('ul').addClass('open');
        }

      });

// 2d menu toggles      $('#secondary-menu').prepend('<a class="js-menu-toggle"></a>');
      $('#secondary-menu').prepend('<a class="js-menu-toggle">Members</a>');

      $('.js-menu-toggle').click(function () {
        var menu_ul = $('#secondary-menu .block-menu > .menu');
        var button_ul = $('.js-menu-toggle');

        if (menu_ul.hasClass('js-open')) {
          menu_ul.removeClass('js-open');
        }
        else {
          menu_ul.addClass('js-open');
        }

        if (button_ul.hasClass('js-close')) {
          button_ul.removeClass('js-close');
        }
        else {
          button_ul.addClass('js-close');
        }
      });

      // Add toggle class to trigger open and closed menu
      $('#secondary-menu .expanded').prepend('<a class="js-submenu-toggle"></a>');

      // Click in the toggle area to trigger open and closed menu
      $('#secondary-menu ul li').click(function () {

        // If this toggle is open, close toggle and menu.
        if ($(this).children('.js-submenu-toggle').hasClass('js-close')) {
          $('.js-submenu-toggle').removeClass('js-close');
          $('#secondary-menu .expanded .menu').removeClass('js-open');
        }
        // If we're clicking on another one, close all and open just this one
        else {
          $('.js-submenu-toggle').removeClass('js-close');
          $('#secondary-menu .expanded .menu').removeClass('js-open');
          $(this).children('.js-submenu-toggle').addClass('js-close');
          $(this).children('ul').addClass('js-open');
        }

      });
      
      // member classes
      // role-Author role-Standard-Member role-Advocacy-Manager role-Individual-or-Student-Member role-Basic-Business admin-menu member-user"
      $('.role-Member').addClass('member-user');
      $('.role-Leadership-Circle-Member').addClass('member-user');
      $('.role-Premium-Member').addClass('member-user');
      $('.role-Advantage-Member').addClass('member-user');
      $('.role-Editor').addClass('member-user');
      $('.role-Author').addClass('member-user');
      $('.role-Site-Admin').addClass('member-user');
      $('.role-Job-Manager').addClass('member-user');
      $('.role-Event-Manager').addClass('member-user');
      $('.role-administrator').addClass('member-user');
      $('.role-501c3-Member').addClass('member-user');
      $('.role-Author').addClass('member-user');
      $('.role-Advocacy-Manager').addClass('member-user');
      $('.role-Standard-Member').addClass('member-user');
      $('.role-Individual-or-Student-Member').addClass('member-user');
      // $('role-Basic-Business').addClass('member-user');
      
      if (!$('body').hasClass('member-user')) {
        $('body').addClass('non-member-user');
      }

        // SEARCH WRAPPER.
        (function() {
          var searchBox = document.querySelector('div.search-box'),
              searchLabel = document.querySelector('div.search-box div.form-item.form-type-textfield.form-item-keys label'),
              searchInput = document.querySelector('div.search-box input.form-text'),
              closeButton = document.createElement('button'),
              searchLink = document.querySelector('a.search-link');
          searchInput.type = 'search';
          searchInput.className += ' fa fa-angle-right fa-lg';
          searchInput.placeholder = 'Search This Site...';
          searchLabel.className += ' element-invisible';
          closeButton.textContent = 'X';
          closeButton.className = 'close-button secondary';
          searchBox.appendChild(closeButton);
          searchLink.onclick = function(event) {
            event.preventDefault();
            searchBox.className = 'search-box';
            $( 'div.main-menu-wrapper div.search-box input.form-text' ).focus();
          };
          closeButton.onclick = function (event) {
            event.preventDefault();
            searchBox.className = 'search-box element-hidden';
          }
        })();

    	}
    };


})(jQuery, Drupal, this, this.document);
