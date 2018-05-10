<table class="table table-striped">
            <thead>
                <tr>
                    <!-- 
                    <th scope="col">
                        #
                    </th> 
                    -->
                    <th scope="col" style="text-align: center">
                        Theme Name
                    </th>
                    <th scope="col" style="text-align: center">
                        See More
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $stmt = $conn->prepare("SELECT id, themename, explanation FROM theme ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $name, $exp);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $name = htmlentities($name);
                    $exp = htmlentities($exp);
                    echo "<tr>";
                        // echo "<th scope=\"row\"> $id </th>";
                        echo "<td> $name </td>";
                        echo "<td>";
                            echo "<button type=\"button\" class=\"btn btn-default\" style=\"border-color:#192A6C;\" data-toggle=\"modal\" data-target=\"#theme_mod$id\">See More</button>";
                            // Modal 
                            echo "<div class=\"modal fade\" id=\"theme_mod$id\" role=\"dialog\">";
                            echo "<div class=\"modal-dialog\">";
                            // Modal content 
                                echo "<div class=\"modal-content\">";
                                    echo "<div class=\"modal-header\">";
                                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                                        // This is the heading
                                        echo "<h4 class=\"modal-title\" style=\"color: #1c2c67;\">$name</h4>";
                                    echo "</div>";
                                    echo "<div class=\"modal-body\">";
                                        // This is the description
                                        echo "<p>$exp</p>";
                                    echo "</div>";
                                    echo "<div class=\"modal-footer\">";
                                        echo "<button type=\"button\" class=\"btn btn-default\" style=\"border-color:#192A6C;\" data-dismiss=\"modal\">Close</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>