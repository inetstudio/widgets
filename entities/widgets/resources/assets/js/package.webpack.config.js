const path = require('path');

module.exports = {
  resolve: {
    alias: {
      '~widgets-package_widgets': path.resolve(__dirname, 'vue/')
    }
  }
};
