import 'package:flutter/material.dart';
import 'package:hadiah_app/constants.dart';
import 'package:provider/provider.dart';
import '../providers/hadiah_provider.dart';
import '../widgets/hadiah_list.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.transparent,
      appBar: AppBar(
        title: const TextField(
          decoration: InputDecoration(
            hintText: 'Semua Toko',
            border: InputBorder.none,
          ),
        ),
        actions: [
          IconButton(
            icon: const Icon(Icons.card_giftcard),
            onPressed: () {
              // Action when button is pressed
            },
          ),
        ],
      ),
      body: SafeArea(
        child: SingleChildScrollView(
          child: Stack(children: [
            Container(
              width: double.infinity,
              padding: const EdgeInsets.all(kDefaultPadding),
              decoration: const BoxDecoration(
                color: Color.fromRGBO(3, 73, 62, 1),
              ),
              child: const Column(
                children: [
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Row(
                        children: [
                          Text(
                            'Username',
                          ),
                        ],
                      ),
                      Text(
                        'Status',
                      ),
                    ],
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Row(
                        children: [
                          Icon(
                            Icons.location_on,
                            color: Colors.white,
                          ),
                          Text(
                            'Alamat',
                          ),
                        ],
                      ),
                      Row(
                        children: [
                          Icon(
                            Icons.phone,
                            color: Colors.white,
                          ),
                          Text(
                            'Nomor Telepon',
                          ),
                        ],
                      ),
                    ],
                  ),
                  SizedBox(
                    height: 30,
                  ),
                ],
              ),
            ),
            Container(
              margin: const EdgeInsets.only(
                top: 80,
              ),
              decoration: const BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.only(
                  topLeft: Radius.circular(30),
                  topRight: Radius.circular(30),
                ),
              ),
              child: FutureBuilder(
                future: Provider.of<HadiahProvider>(context, listen: false)
                    .fetchHadiah(),
                builder: (ctx, snapshot) {
                  if (snapshot.connectionState == ConnectionState.waiting) {
                    return const Center(child: CircularProgressIndicator());
                  } else {
                    return HadiahList();
                  }
                },
              ),
            ),
          ]),
        ),
      ),
    );
  }
}
