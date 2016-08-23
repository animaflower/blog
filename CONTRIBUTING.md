# Canvas Contributing Guide

Hi! I’m really excited that you are interested in contributing to Canvas. Before submitting your contribution though, please make sure to take a moment and read through the following guidelines.

## HipChat

Canvas has an official [HipChat group](https://canvas-blog.hipchat.com/home) to be used as an open forum for those who want to contribute and collaborate on the project. If you'd like to be added to the team, [contact me](mailto:austin.todd.j@gmail.com) and I'll get you set up! 

## Issue Reporting Guidelines

- Try to search for your issue, it may have already been answered or even fixed in the master branch.

- Check if the issue is reproducible with the latest stable version of Canvas. If you are using a previous version, please indicate the specific one you are using.

- It is **required** that you clearly describe the steps necessary to reproduce the issue you are running into. Issues with no clear reproduction steps cannot be assessed.

- If your issue is resolved but still open, don’t hesitate to close it. In case you found a solution by yourself, it could be helpful to explain how you fixed it.

## Pull Request Guidelines

- Keep the commit as small and modular as possible. If your pull request addresses more than one issue, create separate requests.

- Squash the commit if there are too many small ones.

- Make your commit message relevant and useful, referencing an issue or pull request as often as possible:
    - Bad commit message: `refactor`
    - Good commit message: `Refactor store method in PostController #63`

- Follow the [code style](#code-style).

- Make sure `phpunit` tests pass.

- If adding a new feature:
    - Add accompanying test case.
    - Provide convincing reason to add this feature.

- If fixing a bug:
    - Provide detailed description of the bug in the pull request.
    - Add appropriate test coverage if applicable.

## Code Style

- 4 spaces indentation.

- 1 space between blade template braces `{{ $post->title }}`.

- Verbose comment DocBlocks are **required** for PHP functions.

- When in doubt, read the source code.

*If anyone has a code style they would like to see adhered to in this project, [send me a message](mailto:austin.todd.j@gmail.com) and we can look into adding it.*
