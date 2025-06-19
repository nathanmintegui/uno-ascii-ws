# uno-ascii-ws

A simple WebSocket project using **uWebSockets** for fast and lightweight communication.

## Getting Started

### Prerequisites

Before building or running this project, you need to have **uWebSockets** installed on your system.

---

### 1. Clone and build uWebSockets:

```bash
git clone --recurse-submodules https://github.com/uNetworking/uWebSockets
cd uWebSockets
make
sudo make install
```

### 2. Copy the header files:

```base
cd uWebSockets

sudo cp uSockets/src/libusockets.h /usr/local/include
sudo cp uSockets/uSockets.a /usr/local/lib
```

Thanks to talksik answer on this issue. Appreciate it bro.
https://github.com/uNetworking/uWebSockets/issues/1600
