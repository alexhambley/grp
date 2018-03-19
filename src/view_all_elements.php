<!DOCTYPE html>

<table class="table table-striped">
            <thead>
                <tr>
                    <!-- <th scope="col">
                        #
                    </th> -->
                    <th scope="col">
                        Element Name
                    </th>
                    <th scope="col">
                        See More
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $stmt = $conn->prepare("SELECT id, elementname, description FROM element ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $elename, $desc);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $elename = htmlentities($elename);
                    $desc = htmlentities($desc);
                    echo "<tr>";
                        // echo "<th scope=\"row\"> $id </th>";
                        // echo "<th scope=\"row\"> $id </th>";

                        echo "<td> $elename </td>";
                        echo "<td>";
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#ele_mod$id\">See More</button>";
                            // Modal
                            echo "<div class=\"modal fade\" id=\"ele_mod$id\" role=\"dialog\">";
                                echo "<div class=\"modal-dialog\">";
                                    // Modal content
                                    echo "<div class=\"modal-content\">";
                                        echo "<div class=\"modal-header\">";
                                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                                            // This is the heading
                                            echo "<h4 class=\"modal-title\">$elename</h4>";
                                    echo "</div>";
                                    echo "<div class=\"modal-body\">";
                                        // This is the description
                                        echo "<p>$desc</p>";
                                    echo "</div>";
                                    echo "<div class=\"modal-footer\">";
                                        echo "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
