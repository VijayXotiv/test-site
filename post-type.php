<?php /**
* Template Name:Home Page 
*/ 
get_header(); 
?>
<!--------Logo Slider section Section----->
<section class="xt-full-container req-form py-md-5 px-sm-0 mx-sm-0 sec-bottom-shadow">
	<div class="xt-container">
		<div class="xt-row">
			<div class="owl-carousel owl-theme owl-crsl" id="client-slider">
				<?php
					$args  = array(
							'posts_per_page'  => 6,
							'offset'          => 0,
							'orderby'         => 'post_date',
							'order'           => 'ASC',
							'post_type'       => 'logo_post_type',
							'post_status'     => 'publish'
						); 
					$posts = get_posts($args);
					foreach ($posts as $post) : 
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
					?>
						<div class="item">
							<img decoding="async" src="<?php echo $url ?>" class="img-fluid" alt="logo">
						</div>
					<?php endforeach; ?>
			</div>
		</div>
	</div>
</section> 
<!--------Video Section----->
<section class="xt-full-container contents-section section-hm-wrap">
	<div class="xt-container">
		<div class="xt-row">
			<div class="xt-col-6 xt-col-md-12 my-5 xt-order-md-2">
				<h1 class="line-heading">Personal Injury Lawyer in Missouri</h1>
				<h2>Fighting to Recover Maximum Compensation For Injury Victims and Their Families</h2>
				<p  class="pt-md-3">No one ever expects to suffer a personal injury. At a minimum, most personal injury victims lose time at work, which can quickly create a financial crisis in today's uncertain economy. To make matters worse, even injury victims who have health insurance coverage and suffer minor injuries may be faced with a slew of medical bills that may be challenging for them to pay.</p>
				<p class="pt-md-3">Additionally, with the multitude of personal injury attorneys available in the St. Louis area, many accident victims are unsure who they can trust to help them with their claims. Our legal team takes pride in providing quality legal representation for clients so they can focus on recovering.</p>
				<p class="pt-md-3">For these reasons, the Labovitz Law Firm is dedicated to helping accident victims recover maximum compensation for their injuries. Contact our St. Louis, Missouri, law offices and ask to schedule a free consultation so that we may determine your legal options.</p>
			</div>
			<div class="xt-col-6 xt-col-md-12 seccol2 xt-order-md-1">
				<div class="video_section"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/2c9rGhKVKws?rel=0" title="Who is the Labovitz Law Firm" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
			</div>
		</div>
	</div>
</section>
<!--------Services Section----->
<section class="xt-full-container service-section bg-success-color py-5 px-sm-0 mx-sm-0">
	<div class="xt-container px-sm-0">
		<div class="xt-row">
			<div class="xt-col-12 text-center">
				<div class="para-heading-2 yellow-color"><span class="line">HOW CAN WE HELP YOU?</span></div>
			</div>
			<div class="xt-col-12 pt-5 pt-md-3">
				<div id="service-slider" class="owl-carousel owl-theme">
					<?php
						/* $args  = array(
							'posts_per_page'  => 10,
							'offset'          => 0,
							'orderby'         => 'post_date',
							'order'           => 'ASC',
							'post_type'       => 'hwchy_post_type',
							'post_status'     => 'publish'
						); 
						$posts = get_posts($args);
						foreach ($posts as $post) : 
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); */
					?>	
						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/construction-Accident.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Construction and Industrial Accidents<?php //the_title();?></span></div>
									<div class="service-desc">If you have been injured in a construction or industrial accident, we will fight to help you obtain total compensation for your damages.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/construction-and-industrial-accidents/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Pedestrian-Accidents.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Pedestrian Accident<?php //the_title();?></span></div>
									<div class="service-desc">If you have been injured in a pedestrian accident, allow our legal team to help you get the justice you deserve.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/pedestrian-accidents/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Rideshare-Accidents.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Rideshare Accidents<?php //the_title();?></span></div>
									<div class="service-desc">Our personal injury lawyer understands the complexities of rideshare accidents and how to help you obtain compensation for damages.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/car-accidents/rideshare-accidents/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Catastrophic-Injury.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Catastrophic Injury<?php //the_title();?></span></div>
									<div class="service-desc">Our legal team will fight to hold the liable party accountable and recover maximum compensation for your injuries.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/catastrophic-injuries/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Product-lib.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Product Liability<?php //the_title();?></span></div>
									<div class="service-desc">If a defective product has injured you, our law firm will fight to help you obtain maximum financial compensation.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/product-liability/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Vector-2.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Workers Compensation<?php //the_title();?></span></div>
									<div class="service-desc">If you have been injured on the job, allow our law firm to help you obtain the benefits and compensation you deserve.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/workers-compensation/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Layer-5.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Premises Liability<?php //the_title();?></span></div>
									<div class="service-desc">If you have been injured due to negligence, allow our injury attorney to file a compensation claim on your behalf.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/premises-liability/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Truck-Accidents.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Truck Accidents<?php //the_title();?></span></div>
									<div class="service-desc">Our law firm is fearless when it comes to standing up to the trucking companies and their insurers after you have been injured in an accident.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/truck-accidents/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/CarAccident.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Car Accidents<?php //the_title();?></span></div>
									<div class="service-desc">Our personal injury lawyer will assist you with filing an accident claim to help you recover financial compensation after an accident.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/car-accidents/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>

						<div class="item bxalign-cen">
							<div class="xt-col-12">
								<div class="service-icon"><img src="/wp-content/uploads/2023/12/Vector-1.svg<?php //echo $url ?>" class="img -fluid bxalign-cen" alt="icon" /></div>
								<div class="service-card border-sm-card">
									<div class="service-title py-3"><span class="b-r">Motorcycle Accidents<?php //the_title();?></span></div>
									<div class="service-desc">Allow our legal team to act as your legal advocate with the insurance companies after being injured in a motorcycle accident.<?php //echo the_excerpt();?></div>
									<div class="service-btn">
										<a href="/personal-injury/motorcycle-accidents/<?php //the_permalink();?>">Read More</a>
									</div>
								</div>
							</div>
						</div>
					<?php //endforeach;?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------Benifits of hiring section Section----->
<section class="xt-full-container content-section">
	<div class="xt-row">
		<div class="xt-col-6 xt-col-md-12 px-0 xt-order-md-1 d-flex align-items-center">
			<div class="content-right-image">
				<img src="/wp-content/uploads/2023/12/home-section-2.png" class="img-fluid" alt="content-img-01" />
			</div>
		</div>
		<div class="xt-col-6 xt-col-md-12 content-flex xt-order-md-2">
			<div class=" content-right-bg-wrap">
				<h2><span class="line-heading">What are the Benefits of Hiring a Personal Injury Lawyer to Help Me With My Case?</span></h2>
				<p class="pt-md-3">For many accident victims, the idea of hiring a personal injury lawyer can be overwhelming. Others worry about the costs associated with having legal representation. However, if you have been injured due to another person's negligence, it is always in your best interest to hire a qualified lawyer to take legal action on your behalf.</p>
				<p>Some of the benefits of hiring a personal injury lawyer include:</p>
				<ul>
					<li>A working knowledge of personal injury law and what it takes to get results.</li>
					<li>Handle all the legal paperwork and other issues associated with filing your claim.</li>
					<li>Conduct an independent investigation by reviewing police and medical reports and eyewitness testimony, and if necessary, bring in an accident reconstructionist to determine liability issues.</li>
					<li>Will negotiate on your behalf with the insurance provider to obtain a settlement that is in your best interests.</li>
					<li>If the insurance company is unwilling to negotiate, a highly trained lawyer can file a personal injury lawsuit on your behalf.</li>
				</ul>
				<p>If you want more information on the benefits of hiring a personal injury lawyer, contact the Labovitz Law Firm and ask to schedule a consultation with our highly trained personal injury lawyer.</p>
			</div>
		</div>
	</div>
</section>
<!--------Testimonials Section----->
<section class="xt-full-container testimonials-section bg-success-color py-5 px-sm-0 mx-sm-0">
	<div class="xt-container">
		<div class="xt-row">

			<div class="xt-col-12 xt-col-md-12 text-center">
				<div class="para-heading-2 yellow-color"><span class="line">Client Success Stories</span></div>
			</div>
			
				<?php //echo do_shortcode("[trustindex data-widget-id=bb0227c232c3229e9636b445ae3]"); ?>
				<div id="testimonials-slider" class="owl-carousel owl-theme">
					<?php
						$args  = array(
							//'posts_per_page'  => 10,
							//'offset'          => 0,
							'orderby'         => 'post_date',
							'order'           => 'ASC',
							'post_type'       => 'testimonial_slider',
							'post_status'     => 'publish'
						); 
						$posts = get_posts($args);
						foreach ($posts as $post) : 
						//$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
					?>	
					<div class="xt-col-12 xt-col-md-12">
						<div class="item">
							<div class="testimonials-card border-sm-card border-lg-card">
								<div class="tstm1 py-2">
									<img src="/wp-content/uploads/2023/12/success-story.png" class="img-fluid">
								</div>
								<div class="tstm2">
									<div class="font-alt-2 fs-18 white-color py-5 ps-5 pe-5"><?php the_excerpt();?></div>
									<div class="tstm3 py-5">
										<div class="font-alt-2 fw-500 fs-20 white-color mb-3">– <?php the_title();?></div>
										<div><img src="/wp-content/uploads/2023/12/5-star.svg" class="img-fluid"></div>
									</div>
								</div>
							</div>
						</div>
					</div>	
					<?php endforeach; ?>
				
			</div>
			<div class="xt-col-12 xt-col-md-12 text-center">
				<a class="btn btn-primary mt-5" href="<?php site_url();?>/reviews/">SEE ALL SUCCESS STORIES</a>
			</div>

			<div class="xt-col-12 xt-col-md-12 text-center">
				<div class="para-heading-2 sec-saperator"><img src="/wp-content/uploads/2023/12/devider-Vector.svg" /></div>
			</div>

			<div class="xt-col-12 xt-col-md-12 text-center">
				<div class="para-heading-2 yellow-color pb-5"><span class="line">Our Results Speak for Themselves</span></div>
			</div>
			<div class="xt-col-12 xt-col-md-12 text-center">
				<div class="xt-row">
					<div class="xt-col-4 xt-col-md-12">
                        <div class="counter-card home-case-card">
                            <div class="counter-icon"></div>
                                <div class="counter-body">
                                    <div class="counter-number">$2,000,000</div>
									<div><img src="/wp-content/uploads/2023/12/card-saprator-Vector.svg"></div>
                                    <div class="counter-title">Construction Site Injury.</div>
                            </div>
                        </div>
                    </div>
					<div class="xt-col-4 xt-col-md-12">
                        <div class="counter-card home-case-card">
                            <div class="counter-icon"></div>
                                <div class="counter-body">
                                    <div class="counter-number">$1,250,000</div>
									<div><img src="/wp-content/uploads/2023/12/card-saprator-Vector.svg"></div>
                                    <div class="counter-title">Child Struck By Car While Crossing Street At Night.</div>
                            </div>
                        </div>
                    </div>
                    <div class="xt-col-4 xt-col-md-12">
                        <div class="counter-card home-case-card">
                            <div class="counter-icon">
								<!-- <img src="/wp-content/uploads/2023/11/04.png"> -->
							</div>
							<div class="counter-body">
								<div class="counter-number">$1,100,000</div>
								<div><img src="/wp-content/uploads/2023/12/card-saprator-Vector.svg"></div>
								<div class="counter-title">Denied liability tractor trailer accident resulting in spinal injury and surgery.</div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<div class="xt-col-12 xt-col-md-12 text-center">
				<a class="btn btn-primary mt-5" href="<?php site_url();?>/case-results/">View More Case Results</a>
			</div>

		</div>
	</div>
</section>
<!--------Compensation Section----->
<section class="xt-full-container content-section">
	<div class="xt-row">
		<div class="xt-col-6 xt-col-md-12 content-flex xt-order-md-2 mt-5 mt-md-0 d-flex align-items-center">
			<div class="content-left-bg-wrap">
				<h2><span class="line-heading">How Much Compensation Can a Personal Injury Law Firm Help Me Recover?</span></h2>
				<p class="pt-md-3">Missouri law allows personal accident victims to pursue compensation for their injuries and other accident-related damages.</p>
				<p class="pt-md-3">The most common forms of compensation are economic and non-economic damages. Also called compensatory damages, economic and non-economic damages are designed to compensate the victim for their expenditures and intangible losses.</p>
				<h3>Economic Damages</h3>
				<p class="pt-md-3">Some frequently awarded economic damages include:</p>
				<ul>
					<li>Medical expenses</li>
					<li>Medical care such as physical therapy or rehabilitation.</li>
					<li>Lost wages</li>
					<li>Loss of earning capacity</li>
					<li>Property damage</li>
				</ul>
				<h3>Non Economic Damages</h3>
				<p class="pt-md-3">Non-economic damages are based on the unique circumstances of the case and may include:</p>
				<ul>
					<li>Pain and suffering</li>
					<li>Loss of enjoyment of life</li>
					<li>Emotional distress</li>
					<li>Loss of consortium</li>
					<li>Permanent disfigurement and scarring</li>
				</ul>
				<h3>Punitive Damages</h3>
				<p class="pt-md-3">Finally, if the individual responsible for the accident is found to have acted with gross negligence and reckless disregard for others. In that case, the victim may be entitled to file a personal injury lawsuit to try and recover punitive damages. Punitive damages are rarely awarded in Missouri. However, a knowledgeable attorney can determine their suitability for the case.</p>
			</div>
		</div>
		<div class="xt-col-6 xt-col-md-12 xt-order-md-1 px-0 d-flex align-items-center">
			<div class="content-right-image"><img src="/wp-content/uploads/2023/12/home-section-3.png" class="" alt="content-img-01" /></div>
		</div>

	</div>
</section>
<!--------Team Section----->
<section class="xt-full-container service-section content-section">
	<div class="xt-row">

		<div class="xt-col-4 xt-col-md-12 content-flex px-0 mt-5 mt-md-0 px-md-3">
			<div class="content-left-bg-wrap singleimg is_web"><img src="/wp-content/uploads/2023/12/home-section-4.png" class="img-fluid" alt="" /></div>
			<div class="is_tab w-100 "><img src="/wp-content/uploads/2023/12/singleimg.svg" class="img-fluid w-100" alt="" /></div>
		</div>
		<div class="xt-col-8 xt-col-md-12 content-flex sec-bg-cobaltblue mb-5">
			<div class="content-right-bg-wrap attorney">
				<h2><span class="bottom-border">MEET YOUR ATTORNEY</span></h2>
				<h3>BRENT LABOVITZ</h3>
				<h2 class="repeat-white">MISSOURI PERSONAL INJURY ATTORNEY</h2>
				<p class="repeat-white pt-md-3">Brent Labovitz was born and raised in St. Louis. After attending law school in Chicago, Illinois, he knew he wanted to pursue his legal career back home in St. Louis.</p>
				<p class="repeat-white pt-md-3">After Cutting his teeth as a Missouri State Public Defender, and gaining invaluable trial skills, Mr. Labovitz took his skills...</p>
				<div class="xt-col-12 xt-col-md-12">
					<a class="btn btn-primary mt-5" href="<?php site_url();?>/about-us/brent-labovitz/">Get To Know More</a>
				</div>
			</div>
		</div>

	</div>
</section>
<!--------Personal injury claim Section----->
<section class="xt-full-container content-section">
	<div class="xt-row">
		<div class="xt-col-6 xt-col-md-12 content-flex xt-order-md-2">
			<div class="content-left-bg-wrap py-4">
				<h2><span class="line-heading">Does Your Attorney Have the Experience Needed to Obtain a Favorable Outcome for My Personal Injury Claim?</span></h2>
				<p class="pt-md-3">Our personal injury attorney, Brent Labovitz, has comprehensive experience handling injury claims and complex litigation issues. While in law school, Brent realized that he wanted to serve the citizens of St. Louis and provide injury victims with the legal counsel they needed to compensate them for their harm.</p>
				<p class="pt-md-3">Mr. Labovitz and our legal team are passionate about obtaining a personal injury settlement to adequately compensate for your damages. Many injury victims are initially unaware that most personal injury cases are settled out of court through negotiations with the insurance carrier.</p>
				<p class="pt-md-3">Brent Labovitz is unlike other personal injury lawyers who encourage their clients to make a quick agreement with the insurance company. Instead, Brent fights to help clients obtain maximum compensation after being injured to ensure they can face the future confidently.</p>
				<p class="pt-md-3">If you want more information about our law firm or Mr. Labovitz's experience, contact our law offices to schedule a meeting where we will gladly address your concerns.</p>
			</div>
		</div>
		<div class="xt-col-6 xt-col-md-12 px-0 xt-order-md-1">
			<div class="content-right-image "><img src="/wp-content/uploads/2023/12/home-section-img-5.png" class="" alt="content-img-01" /></div>
		</div>
	</div>
</section>
<!--------Why Choose Section----->
<section class="xt-full-container why-choose-us  py-5">
	<div class="xt-container">
		<div class="xt-row">
			<div class="xt-col-12 text-center">
				<div class="para-heading-2 yellow-color pb-5"><span class="line">Why Choose Us?</span></div>
			</div>   
		</div>
        <div class="is_web"><div class="xt-row">
				<?php
				$args  = array(
					'posts_per_page'  => 6,
					'offset'          => 0,
					'orderby'         => 'post_date',
					'order'           => 'ASC',
					'post_type'       => 'wcu_post_type',
					'post_status'     => 'publish'
				); 
				$posts = get_posts($args);
				foreach ($posts as $post) : 
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
			?>	
				<div class="xt-col-4 mt-4 is_web">
					<div class="why-card border-sm-card">
						<div class="why-icon"><img src="<?php echo $url ?>" class="img-fluid"></div>
						<div class="why-title"><?php the_title();?></div>
						<div class="why-desc"><?php 
						//$trimmed_content = wp_trim_words($content, 40, '...&lt;a href="' . get_permalink() . '">more&lt;/a>');
						//echo $trimmed_content;
						the_excerpt(80);?></div>
					</div>
				</div>
			<?php endforeach; ?>
			</div></div>
            <div class="is_tab"><div class="xt-row">
                <div class="xt-col-12 xt-col-md-12 mob-whychoose px-md-0">
                <div class="owl-carousel owl-theme" id="mwhychoose-slider" >
                <?php
                $args  = array(
                'posts_per_page'  => 6,
                'offset'          => 0,
                'orderby'         => 'post_date',
                'order'           => 'ASC',
                'post_type'       => 'wcu_post_type',
                'post_status'     => 'publish'
                ); 
                $posts = get_posts($args);
                foreach ($posts as $post) : 
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
                ?>	
                <div class="item">
                <div class="why-card border-sm-card">
                <div class="why-icon"><img src="<?php echo $url ?>" class="img-fluid"></div>
                <div class="why-title"><?php the_title();?></div>
                <div class="why-desc"><?php the_excerpt(80);?></div>
                </div>
                </div>
                <?php endforeach; ?>
                </div></div></div>
            </div>
		</div>
</section>

<!--------Personal Injury Case Section----->
<section class="xt-full-container content-section">
	<div class="xt-row">
		<div class="xt-col-6 xt-col-md-12 px-0">
			<div class="content-left-image"><img src="/wp-content/uploads/2023/12/home-section-7-img.png" class="img-fluid" alt="content-img-01" /></div>
		</div>
		<div class="xt-col-6 xt-col-md-12 content-flex px-md-0">
			<div class="content-right-bg-wrap">
				<h2><span class="line-heading">Can Your Law Office Obtain Favorable Results for My Personal Injury Case?</span></h2>
				<p class="pt-md-3">The Labovitz Law Firm has a proven record of obtaining favorable client results. We strive to protect our client's legal rights and hold the other party accountable for their actions.</p>
				<p>Suppose you have suffered severe or permanent injuries due to someone else's negligence. Serious injuries such as spinal cord or traumatic brain injuries (TBIs) will most likely require lifelong nursing care as well as potential and ongoing testing.</p>
				<p>Our law office realizes that for many of our clients, being able to collect maximum compensation is imperative for them to be able to resume their lives. If you or a family member has been severely injured or has previously been denied compensation, you must hire an attorney who will be fearless in fighting for your future.</p>
				<p>Brent Labovitz is an experienced personal injury attorney who provides his clients with vigorous legal representation to ensure they receive a recovery that will accommodate their financial and emotional needs.</p>
			</div>
		</div>
	</div>
</section>
<!--------Latest Articles Section----->
<section class="xt-full-container blog-section service-section py-5 mx-sm-0 px-sm-0">
	<div class="xt-container">
		<div class="para-heading-2 yellow-color  text-center pb-5"><span class="line">Latest Articles & Insights</span></div>
		<div class="xt-row">
			<div class="xt-col-12 blog-latest-inner px-md-0">
				<div class="owl-carousel owl-theme" id="blog-slider">
					<?php //echo do_shortcode("[home_latest_blog_web]"); ?>
					<?php
						$args  = array(
							'posts_per_page'  => 3,
							'offset'          => 0,
							'category'        => 90,
							'orderby'         => 'post_date',
							'order'           => 'ASC',
							'post_type'       => 'post',
							'post_status'     => 'publish'
						); 
						$posts = get_posts($args);
						foreach ($posts as $post) : 
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
						$archive_year  = get_the_time( 'Y' );
						$archive_month = get_the_time( 'm' );
						$archive_day   = get_the_time( 'd' );
						$month= get_the_date('M');
					?>	
						<div class="item blog-sec">
							<div class="rpc_bg">
								<div class="latest-image">
									<img class="latst img-fluid" src="<?php echo $url ?>" alt="<?php the_title();?>" />
								</div>
								<div class="blog-sec-inner p-3 txt">
									<div class="rpc-date pb-3">
										<div>POSTED BY: <?php echo get_the_author(); ?></div>
										<div><?php echo $month."&nbsp;".$archive_day.",&nbsp;".$archive_year;?></div>
									</div>
									<div class="rpc_title pb-1"><?php the_title();?></div>	
									<div class="service-btn"><a href="<?php the_permalink() ?>">Read More</a></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="xt-col-12 xt-col-md-12 text-center"><a class="btn btn-primary mt-5" href="<?php site_url();?>/blog/">SEE ALL ARTICLES</a></div>
		</div>
	</div>
</section>
<!--------Compensation 2 Section----->
<section class="xt-full-container content-section">
	<div class="xt-row">
		<div class="xt-col-6 xt-col-md-12 content-flex xt-order-md-2">
			<div class="content-left-bg-wrap">
				<h2><span class="line-heading">Choose The Labovitz Law Firm for Reliable Represenation and the Right Results!</span></h2>
				<p class="pt-md-3">The Labovitz Law Firm is proud of the quality service we have provided to citizens of St. Louis and the surrounding areas. Our personal injury attorney and the rest of our legal staff are dedicated to helping clients through one of the most traumatic events they may ever suffer.</p>
				<p class="pt-md-3">As a result, we take time to listen to our client's needs and create a custom-tailored legal strategy that will provide an optimal outcome for their case.</p>
				<p class="pt-md-3">We realize that our client's primary concern is being able to obtain the compensation they need to afford the medical treatment they need, as well as make amends for the emotional suffering their families have had to endure.</p>
				<p class="pt-md-3">If you want a personal injury attorney who will fight for your future, contact the Labovitz Law Firm of St. Louis, Missouri, at 314-668-2268 and ask to schedule a free case evaluation. For your convenience, we are located 1.4 mi from Brentwood City Hall, 1.2 mi from Memorial Park, and 9.5 mi from St. Louis Lambert International Airport.</p>
			</div>
		</div>
		<div class="xt-col-6 xt-col-md-12 px-0 xt-order-md-1">
			<div class="content-right-image"><img src="/wp-content/uploads/2023/12/home-section8-img.png" class="img-fluid" alt="content-img-01" /></div>
		</div>
	</div>
</section>
<!--------FAQ's Section----->
<section class="xt-full-container faq-section py-5 px-sm-0 mx-sm-0">
	<div class="xt-container">
		<div class="xt-row">
			<div class="xt-col-12 xt-col-md-12">
				<div class="para-heading-2 yellow-color text-center"><span class="line">Frequently Asked Questions</div>
				</div>
				<div class="xt-col-12 xt-col-md-12 faq-wrap">
					<?php
						$args  = array(
							'posts_per_page'  => 10,
							'offset'          => 0,
							'orderby'         => 'post_date',
							'order'           => 'ASC',
							'post_type'       => 'llf_faq_post_type',
							'post_status'     => 'publish'
						); 
						$posts = get_posts($args);
						$item_no = 1;
						foreach ($posts as $post) : 
						$get_contnt = $post->post_content;
					?>	
						<details <?php if($item_no == 1) echo "open"; ?>>
							<summary class="accordian-title"><?php the_title();?></summary>
							<p class="accordian-text"><?php echo $get_contnt; ?></p>
						</details>
					<?php 
					$item_no++;
					endforeach;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------News Section----->
<section class="xt-full-container blog-section bg-success-color-homCntct py-5 mx-sm-0 px-sm-0">
	<div class="xt-container">

		<div class="para-heading-2 white-color text-center"> - CONTACT US TODAY - </div>
		<div class="para-heading-3 white-color text-center pb-3">FOR A FREE CONSULTATION!</div>
				<div class="xt-row">
					<div class="xt-col-12 xt-col-md-12">
						<div class="homepage-form text-center" id="contact-us">
							<?php echo do_shortcode("[contact-form-7 id='59428f1' title='Home-Form']"); ?>
				</div>
			</div>
		</div>

	</div>
</section>
<!--------News Section-----> 
<?php  get_footer(); ?>