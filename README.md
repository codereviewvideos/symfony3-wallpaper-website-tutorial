# Symfony3 Beginner Friendly Tutorial

In this Symfony 3 tutorial series we are going to expand on the knowledge we've gained during the previous course - the ["Symfony 3 for Beginners" tutorial][1].

In this tutorial we are going to takes a hands-on approach to building a Wallpaper / Desktop Background sharing website. These websites were particularly popular a few years back, but regardless of how "cool" they are currently, I believe they make an interesting example of a website that we can take from idea to production / online in a very short space of time.

This short feedback loop is a brilliant motivator in getting started, but more importantly, in finishing.

There's nothing more demotivating than having a bunch of projects sat on your hard disk at various states of completion - 10% done is as good as 90% done if you never see your projects through to completion.

Now, as mentioned, perhaps a wallpaper / desktop background site as our example isn't doing it for you. Don't be discouraged, as without too much alteration this very same foundation could be repurposed as a real estate listing site, or a personal photography portfolio, or if image heavy sites aren't your thing, then a job listings site.

The point here is not to cover how to make a wallpaper / desktop background site. The end product is simply a nice bonus of expanding our knowledge of Symfony, and continuing our learning into what the Symfony framework can offer.

The outcome of this course is to:

* Continue our exploration of the Symfony framework
* Build something we can show others
* Have a base for learning some really cool stuff (keep reading)

This course is split into three parts.

In this first part we are going to focus on getting the MVP (minimum viable product) up and running. There's a lot to learn along the way, with plenty of new concepts to cover.

The only requirement to get started is to have complete the ["Symfony 3 for Beginners" tutorial][1], or have the equivalent knowledge.

One thing I have found is that the more I learn about software development, the more I desire perfection before I release my projects into the wild. Outside of a learning environment, this is incredibly counter productive for two major reasons:

* Perfect software with no audience is a waste of time
* Without an audience you have no urge to improve

Let's quickly address these two before going further.

"Perfect software with no audience is a waste of time" - I would hazard a guess that we all wish to make our code the best, the most clean, the most extensible and maintainable that we can achieve. There's nothing wrong with this from a theoretical standpoint, but sooner or later we must ship our code.

So long as the site works, our visitors don't care if we shaved point 2 nanoseconds off our `foreach` loop. They also don't care if we wrote our site as a mess of procedural spaghetti, or the neatest example of MVC known to human kind.

This isn't to say we won't be doing things to the best of our ability throughout this course. However, it is the reason that we are going with Symfony and Twig, as opposed to building out a full JSON API with a React front end.

After all, it's better to get *something* online even if it's a little rough around the edges, rather than having yet another unfinished project littering up our hard disk.

"Without an audience you have no urge to improve" - Once our site is online, hopefully we will have some visitors come by and check it out. Seeing as we know how to do so, [we could add a "Contact Form"][2] and let our visitors tell us exactly what they think of our amazing creation (shields up!).

If given the chance, visitors to our site will - hopefully - give us feedback / suggestions / ideas that we may never have dreamed up. I know that's been the case for me with CodeReviewVideos.

As an example of this, we might want to add in some simple statistics to our website. Sure, we can add in Google Analytics without too much fuss, but what if we wanted to track page visits to our various wallpapers / categories?

There's a bunch of ways we could do this. And these sorts of improvements will be the focus of the second part of this series.

To give you a sneak peak into this part of the course, we might start off by creating a query that updates a counter in our database whenever a visitors hits our page. This is the sort of thing that actually works really well, to begin with. But as our site visitor count grows in number, this solution may no longer be suitable, so we will cover alternatives such as using Redis, and RabbitMQ.

For the final part of the series, we are going to take our MVP and re-write it using Test Driven Development techniques. What's most interesting about this is that the code we create when using TDD is often subtly different from that which we create without concerning ourselves with tests.

There's plenty to cover along the way, so without further ado, let's get started.




[1]: /course/symfony-3-for-beginners/video/walking-through-the-initial-app
[2]: /course/symfony-3-for-beginners/video/adding-the-contact-form