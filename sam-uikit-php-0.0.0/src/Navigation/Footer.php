<?php

namespace SAMUIKit\Navigation;

use SAMUIKit\Other;

class Footer {

	static public function build($config)
	{
        $type = $config['type'];
        $logo = $config['logo'];
        $name = $config['name'];
        $links = ( isset($config['links']) ) ? $config['links'] : null;
        $number = ( isset($config['number']) ) ? $config['number'] : null;
        $email = ( isset($config['email']) ) ? $config['email'] : null;
        $social = ( isset($config['social']) ) ? $config['social'] : null;
        $facebook = null;
        $twitter = null;
        $youtube = null;
        $rss = null;
        if ( !is_null($social) ) {
            $facebook = ( isset($social['facebook']) ) ? $social['facebook'] : null;
            $twitter = ( isset($social['twitter']) ) ? $social['twitter'] : null;
            $youtube = ( isset($social['youtube']) ) ? $social['youtube'] : null;
            $rss = ( isset($social['rss']) ) ? $social['rss'] : null;
        }
        $sections = ( isset($config['sections']) ) ? $config['sections'] : null;
        $signUpTarget = ( isset($config['signUpTarget']) ) ? $config['signUpTarget'] : null;
        
        $string = '';

        // open footer
        if ( $type == 'big' ) {
            $string .= '<footer class="usa-footer usa-footer-big usa-sans" role="contentinfo">';

        } elseif ( $type == 'medium' ) {
            $string .= '<footer class="usa-footer usa-footer-medium usa-sans" role="contentinfo">';

        } elseif ( $type == 'slim' ) {
            $string .= '<footer class="usa-footer usa-footer-slim usa-sans" role="contentinfo">';

        }

        // return to top link
        $string .= '<div class="usa-grid usa-footer-return-to-top">';
        $string .= '<a href="#">Return to top</a>';
        $string .= '</div>';

        // primary section
        if ( $type == 'big' ) {
            if ( !is_null($sections) || !is_null($signUpTarget) ) {
                $string .= '<div class="usa-footer-primary-section">';
                $string .= '<div class="usa-grid-full">';

            }

            if ( !is_null($sections) ) {
                // navigation area - leave room for sign in form
                $string .= '<nav class="usa-footer-nav usa-width-two-thirds">';
                $count = 0;
                foreach ($sections as $section) {
                    if ( $count >= 4 ) {
                        break;
                    }
                    $string .= '<ul class="usa-unstyled-list usa-width-one-fourth usa-footer-primary-content">';
                    $string .= '<h4 class="usa-footer-primary-link">'. $section['title'] .'</h4>';
                    foreach ($section['links'] as $target => $title) {
                        $string .= '<li><a href="'. $target .'">'. $title .'</a></li>';

                    }
                    $string .= '</ul>';
                    $count++;
                }
                $string .= '</nav>';                
            }

            if ( !is_null($signUpTarget) ) {
                // TODO: Make configurable
                $string .= '<div class="usa-sign_up-block usa-width-one-third">';
                $string .= '<h3 class="usa-sign_up-header">Sign up</h3>';
                $string .= '<form method="POST" action="'. $signUpTarget .'">';
                $string .= '<label class="" for="email" id="">Your email address</label>';
                $string .= '<input id="email" name="email" type="email">';
                $string .= Other::button(['title' => 'Sign up']);
                $string .= '</form>';
                $string .= '</div>';
            }

            if ( !is_null($sections) || !is_null($signUpTarget) ) {
                $string .= '</div>';
                $string .= '</div>';

            }

        } elseif ( $type == 'medium' ) {
            if ( !is_null($links) ) {
                $string .= '<div class="usa-footer-primary-section">';
                $string .= '<div class="usa-grid-full">';
                $string .= '<nav class="usa-footer-nav">';
                $string .= '<ul class="usa-unstyled-list">';
                $count = 0;
                foreach($links as $target => $title) {
                    if ( $count >= 5 ) {
                        // only display 5 links
                        break;
                    }
                    $string .= '<li class="usa-width-one-sixth usa-footer-primary-content">';
                    $string .= '<a class="usa-footer-primary-link" href="'. $target .'">'. $title .'</a>';
                    $string .= '</li>';
                    $count++;
                }
                $string .= '</ul>';
                $string .= '</nav>';
                $string .= '</div>';
                $string .= '</div>';

            }

        } elseif ( $type == 'slim' ) {

            if ( !is_null($links) || !is_null($number) || !is_null($email) ) {
                $string .= '<div class="usa-footer-primary-section">';
                $string .= '<div class="usa-grid-full">';               
            }

            // handle navigation links
            if ( !is_null($links) ) {
                $string .= '<nav class="usa-footer-nav usa-width-two-thirds">';
                $string .= '<ul class="usa-unstyled-list">';
                $count = 0;
                foreach($links as $target => $title) {
                    if ( $count >= 4 ) {
                        // only display 5 links
                        break;
                    }
                    $string .= '<li class="usa-width-one-fourth usa-footer-primary-content">';
                    $string .= '<a class="usa-footer-primary-link" href="'. $target .'">'. $title .'</a>';
                    $string .= '</li>';
                    $count++;
                }               
                $string .= '</ul>';
                $string .= '</nav>';

            }

            // handle contact number
            if ( !is_null($number) ) {
                $string .= '<div class="usa-width-one-sixth usa-footer-primary-content">';
                $string .= '<p>(800) CALL-GOVT</p>';
                $string .= '</div>';

            }

            // handle contact email
            if ( !is_null($email) ) {
                $string .= '<div class="usa-width-one-sixth usa-footer-primary-content">';
                $string .= '<a href="mailto:'. $email .'">'. $email .'</a>';
                $string .= '</div>';

            }

            if ( !is_null($links) || !is_null($number) || !is_null($email) ) {
                $string .= '</div>';
                $string .= '</div>';
            }
        }

        // secondary section
        if ( $type == 'medium' || $type == 'big' ) {
            if ( $type == 'big' ) {
                $string .= '<div class="usa-footer-secondary_section usa-footer-big-secondary-section">';

            } elseif ( $type == 'medium' ) {
                $string .= '<div class="usa-footer-secondary_section">';    

            }
            $string .= '<div class="usa-grid">';
            $string .= '<div class="usa-footer-logo usa-width-one-half">';
            $string .= '<img class="usa-footer-img" src="'. $logo['path'] .'" alt="'. $logo['alt'] .'">';
            $string .= '<h3 class="usa-footer-logo-heading">'. $name .'</h3>';
            $string .= '</div>';

            // social media
            if ( !is_null($number) || !is_null($email) || !is_null($facebook) || !is_null($twitter) || !is_null($youtube) || !is_null($rss) ) {
                $string .= '<div class="usa-footer-contact-links usa-width-one-half">';

                if ( !is_null($facebook) || !is_null($twitter) || !is_null($youtube) || !is_null($rss) ) {
                    $string .= '<div class="usa-social-links">';
                    if ( !is_null($facebook) ) {
                        $string .= '<a href="'. $facebook .'">';
                        $string .= '<svg width="26" height="39" role="img" aria-label="Facebook">';
                        $string .= '<title>Facebook</title>';
                        $string .= '<image xlink:href="/img/social-icons/svg/facebook25.svg" src="/img/social-icons/png/facebook25.png" width="26" height="39"></image>';
                        $string .= '</svg>';
                        $string .= '</a>';

                    }

                    if ( !is_null($twitter) ) {
                        $string .= '<a href="'. $twitter .'">';
                        $string .= '<svg width="26" height="39" role="img" aria-label="Twitter">';
                        $string .= '<title>Twitter</title>';
                        $string .= '<image xlink:href="/img/social-icons/svg/twitter16.svg" src="/img/social-icons/png/twitter16.png" width="26" height="39"></image>';
                        $string .= '</svg>';
                        $string .= '</a>';

                    }

                    if ( !is_null($youtube) ) {
                        $string .= '<a href="'. $youtube .'">';
                        $string .= '<svg width="26" height="39" role="img" aria-label="YouTube">';
                        $string .= '<title>YouTube</title>';
                        $string .= '<image xlink:href="/img/social-icons/svg/youtube15.svg" src="/img/social-icons/png/youtube15.png" width="26" height="39"></image>';
                        $string .= '</svg>';
                        $string .= '</a>';

                    }

                    if ( !is_null($rss) ) {
                        $string .= '<a href="'. $rss .'">';
                        $string .= '<svg width="26" height="39" role="img" aria-label="RSS">';
                        $string .= '<title>RSS</title>';
                        $string .= '<image xlink:href="/img/social-icons/svg/rss25.svg" src="/img/social-icons/png/rss25.png" width="26" height="39"></image>';
                        $string .= '</svg>';
                        $string .= '</a>';

                    }
                    $string .= '</div>';
                }

                if ( !is_null($number) || !is_null($email) ) {
                    $string .= '<address>';
                    $string .= '<h3 class="usa-footer-contact-heading">Agency Contact Center</h3>';
                    if ( !is_null($number) ) {
                        $string .= '<p>'. $number .'</p>';
                        $string .= '<a href="mailto:'. $email .'">'. $email .'</a>';
                    }
                    $string .= '</address>';

                }
            }

            $string .= '</div>';
            $string .= '</div>';

        } elseif ( $type == 'slim' ) {
            $string .= '<div class="usa-footer-secondary_section">';
            $string .= '<div class="usa-grid">';
            $string .= '<div class="usa-footer-logo">';
            $string .= '<img class="usa-footer-slim-logo-img" src="'. $logo['path'] .'" alt="'. $logo['alt'] .'">';
            $string .= '<h3 class="usa-footer-slim-logo-heading">'. $name .'</h3>';
            $string .= '</div>';
            $string .= '</div>';
            $string .= '</div>';

        }

        $string .= '</footer>';
  
        return $string;
	}
}