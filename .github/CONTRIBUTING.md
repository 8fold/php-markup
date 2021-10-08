# Contributing

Contributions are **welcome** and will be **credited**. We accept contributions via Pull Requests on [GitHub](https://github.com/8fold/php-shoop).

## Priorities

We leverage GitHub's labeling system to inform prioritization of issues. The higher the number, the higher priority.

Security is always the highest priority within the applicable scope of the product. Therefore, some packages are low-level and intended for developers and give the flexibility to them to surround the package with a security layer.

## Overall goals (philosophy and values)

There are a lot of philosphical things tied in to the way we strive to do software development. Some you are most likely familiar with, others maybe not so much.

**You ain't gonna need it (YAGNI):** If someone hasn't asked for it, someone's not paying for it, and it's not needed to finish what has been asked and paid for, then don't develop that thing. (There are some extreme corner cases here, but they are extreme and rare.)

**Don't repeat yourself (DRY):** If you are about to copy and paste that bit of code, reconsider. If you have a method that does exactly what you need it to, creating two means there's a possibility one will get out of sync or miss out on that update you make in a few months.

**Keep it simple, stupid:** (I could really live without the "stupid" piece.) Write the simplest code that could work. (This one actually comes with a lot of caveats, but it does hold true quite often.)

**Make it SOLID:** This is actually a set of principles in and of itself:

- *Single responsibility principle:* Each thing you write should have one responsibility. Specifically classes.
- *Open/closed principle:* Objects should be open for extension, but closed to modification.
- *Liskov substitution principle:* Object should be replaceable by subtypes without affecting the correctness of the program.
- *Interface segregation principle:* Prefer client-specific interfaces over generic catch-all interfaces.
- *Dependency inversion principle:* Admittedly, don't really know this one well enough to say we follow it or not. (Most likely not as well as we could.)

**Solutions over scapegoats:** There are times when these principles will not be followed or someone will make a mistake. Berating the offender doesn't get any of us any closer to improving the execution of these principles.

**The Community Principle:** If you create or acquire it you help maintain it; time, food, money, and so on.

## Code promotion

Capabilities should be implemented at a low, concrete level before being promoted to higher-levels and made more abstract.

## Code access

If the language being used allows access levels on variable, constants, methods, and so on, it is preferred that the access level begins at the most strict and becomes less restrictive out of necessity.

This reduces the size of the public API, which makes the class easier to consume by developers.

Further, it is preferred that class properties remain private, always. This means pre- and post-processing for setting and getting properties can be added without being a breaking change to developers.

## Releasing

Major - fix bugs -> Patch - optimize -> Minor - fix bugs -> Patch - new feature -> Minor - interface changes -> Major
